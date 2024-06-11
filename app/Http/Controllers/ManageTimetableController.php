<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use App\Models\TimetableRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageTimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $role = $user->role; // Get the user's role

        if ($role == 'Teacher') {
            $timetables = Timetable::all();

            return view('ManageTimetable.Teacher.TimetableList', compact('timetables'));
        } else if ($role == 'Parent') {
            return view('ManageTimetable.Parent.TimetableList', compact('timetables'));
        } else if ($role == 'Kafa') {
            $timetables = Timetable::whereHas('requests', function ($query) {
                $query->where('timetableID', 'pending'); // or any other condition you want to apply
            })->get();
            return view('ManageTimetable.KAFAAdmin.TimetableChangeRequestList', compact('timetables'));
        } else {
            // Handle the case where the role is neither Teacher nor Parent
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role', 'Teacher')->get(); // assuming you have a User model and a 'role' field in your users table
        return view('ManageTimetable.KAFAAdmin.TimetableAdd', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $rules = [
        'id' => 'required',
        'class_name' => 'required',
    ];

    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
    $times = [1, 2, 3, 4, 5];

    foreach ($days as $day) {
        foreach ($times as $time) {
            $field = $day. $time;
            $rules[$field] = 'nullable'; // make the subject fields optional
        }
    }

    $request->validate($rules);

    // Create the timetable
    $timetable = new Timetable();
    $timetable->userID = $request->input('id'); // Get the selected userID from the class_teacher select tag
    $timetable->timetable_classname = $request->input('class_name');
    $timetable->timetable_year = now()->year; // Set the current year as the timetable_year

    foreach ($days as $day) {
        foreach ($times as $time) {
            $field = $day. $time;
            $subject = $request->input($field);
            if ($subject) {
                $timetable->$field = $subject; // Store the subject data in the timetable model
            }
        }
    }

    $timetable->save();

    // Redirect the user back to the timetable list page
    return redirect()->route('manage.timetable.list')->with('success', 'Timetable created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $user = Auth::user(); // Get the authenticated user
    $role = $user->role; // Get the user's role

    $teacherID = $user->id; // assuming you are using Laravel's built-in auth system

    // Fetch the specific timetable by ID
    $specificTimetable = Timetable::with('user')->where('id', $id)->firstOrFail();

    // Fetch all timetables for the authenticated user
    $timetables = Timetable::with('user')->where('userID', $teacherID)->get();
    
    // Fetch the class name from the specific timetable (assuming classname is a field in the timetables table)
    $timetable_classname = $specificTimetable->timetable_classname;

    if ($role == 'Teacher') {
        return view('ManageTimetable.Teacher.TimetableView', compact('specificTimetable', 'timetables', 'timetable_classname'));
    } else if ($role == 'Parent') {
        return view('ManageTimetable.Parent.TimetableView', compact('specificTimetable', 'timetables', 'timetable_classname'));
    } else if ($role == 'Kafa') {
        return view('ManageTimetable.KAFAAdmin.TimetableView', compact('specificTimetable', 'timetables', 'timetable_classname'));
    } else {
        // Handle the case where the role is neither Teacher nor Parent
        abort(403, 'Unauthorized action.');
    }
}

public function showRequest(Request $request, $id)
{
    // Retrieve the timetable request with the given $id
    $timetableRequest = TimetableRequest::findOrFail($id);

    // Return the view with the timetable request details
    return view('ManageTimetable.KAFAAdmin.TimetableChangeRequestView', compact('timetableRequest'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Find the timetable record by its ID
    $timetable = Timetable::find($id);

    // Retrieve all users who have the role of 'Teacher'
    $teachers = User::where('role', 'Teacher')->get();

    // Pass the timetable and teachers data to the TimetableEdit view
    return view('ManageTimetable.KAFAAdmin.TimetableEdit', compact('timetable', 'teachers'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the request data
    $rules = [
        'class_teacher' => 'required',
        'class_name' => 'required',
    ];

    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
    $times = [1, 2, 3, 4, 5];

    foreach ($days as $day) {
        foreach ($times as $time) {
            $field = $day. $time;
            $rules[$field] = 'nullable'; // make the subject fields optional
        }
    }

    $request->validate($rules);

    // Update the timetable
    $timetable = Timetable::find($id);
    $timetable->userID = $request->input('class_teacher'); // Get the selected userID from the class_teacher select tag
    $timetable->timetable_classname = $request->input('class_name');
    $timetable->timetable_year = now()->year; // Set the current year as the timetable_year

    foreach ($days as $day) {
        foreach ($times as $time) {
            $field = $day. $time;
            $subject = $request->input($field);
            if ($subject) {
                $timetable->$field = $subject; // Update the subject data in the timetable model
            }
        }
    }

    $timetable->save();

    return redirect()->route('manage.timetable.list')
        ->with('success', 'Timetable updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $timetable = Timetable::findOrFail($id);
    $timetable->delete();

    return redirect()->route('manage.timetable.list')->with('success', 'Timetable deleted successfully.');
}

public function confirm($id)
{
    $timetable = Timetable::findOrFail($id);
    return view('ManageTimetable.KAFAAdmin.TimetableDelete', compact('timetable'));
}

    public function teacherTemplateTimetable()
    {
        return view('ManageTimetable.Teacher.TeacherTemplate');
    }
    public function parentTemplateTimetable()
    {
        return view('ManageTimetable.Parent.ParentTemplate');
    }
    public function timetablelist()
{
    $user = Auth::user(); // Get the authenticated user
    $role = $user->role; // Get the user's role
    
    $timetables = Timetable::with('user')->where('userID', $user->id)->get(); // Fetch timetables related to the authenticated user
    $timetables1 = Timetable::all();

    if ($role == 'Teacher') {
        return view('ManageTimetable.Teacher.TimetableList', compact('timetables'));
    } else if ($role == 'Parent') {
        return view('ManageTimetable.Parent.TimetableList', compact('timetables','timetables1'));
    } else if ($role == 'Kafa') {
        return view('ManageTimetable.KAFAAdmin.TimetableList', compact('timetables','timetables1'));
    } else {
        // Handle the case where the role is neither Teacher nor Parent
        abort(403, 'Unauthorized action.');
    }
}

public function addrequest($timetableID)
{
    $userid = Auth::id(); // get the current user's ID
    return view('ManageTimetable.Teacher.TimetableChangeRequest', compact('userid', 'timetableID'));
}

    public function storerequest(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'day' => 'required|string',
        'time' => 'required|string',
        'subject' => 'required|string',
        'comment' => 'nullable|string',
    ]);

    // Get the timetable ID from the request or default to a valid value
    $timetableID = $request->input('timetableID');

    // Create a new request entry
    $timetableRequest = new TimetableRequest();
    $timetableRequest->teacherID = Auth::id(); // Assuming the user ID is to be stored
    $timetableRequest->timetableID = $timetableID; // set the timetable ID
    $timetableRequest->request_day = $validated['day'];
    $timetableRequest->request_time = $validated['time'];
    $timetableRequest->request_subject = $validated['subject'];
    $timetableRequest->request_reason = $validated['comment'];
    $timetableRequest->save();

    // Redirect to the timetable list with a success message
    return redirect()->route('manage.timetable.list')->with('success', 'Timetable request created successfully!');
}
}
