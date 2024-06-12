<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use App\Models\Users;
use Illuminate\Http\Request;

class ManageTimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timetables = Timetable::all();

        return view('ManageTimetable.Teacher.TimetableList', compact('timetables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ManageTimetable.Teacher.TimetableList');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Timetable::create($request->all());

        return redirect()->route('ManageTimetable.Teacher.TimetableList')
            ->with('success', 'Timetable created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $teacherID = auth()->user()->id; // assuming you are using Laravel's built-in auth system
    $timetables = Timetable::with('teacher')->where('teacherID', $teacherID)->find($id);
    $timetable_classname = $timetables->timetable_classname; // assuming classname is a field in the timetables table

    return view('ManageTimetable.Teacher.TimetableView', compact('timetables', 'timetable_classname'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $timetables = Timetable::find($id);

        return view('ManageTimetable.KAFAAdmin.TimetableEdit', compact('timetables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $timetables = Timetable::find($id);
        $timetables->update($request->all());

        return redirect()->route('ManageTimetable.Teacher.TimetableList')
            ->with('success', 'Timetables updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timetables = Timetable::find($id);
        $timetables->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Timetable deleted successfully');
    }

    public function teacherTemplateTimetable()
    {
        return view('ManageTimetable.Teacher.TeacherTemplate');
    }
    public function timetablelist()
    {
        $timetables = Timetable::with('user')->get();

        foreach ($timetables as $timetable) {
            $role = $timetable->user->role;
            // do something with the role
        }

        return view('ManageTimetable.Teacher.TimetableList', compact('timetables'));
    }
}
