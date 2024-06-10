<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Parents;
use App\Models\User;

class ManageProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve users who are parents
        $parents = Parents::all();

        // Retrieve users who are teachers
        $teachers = Teacher::all();


        // Pass data to the view
        return view('ManageProfile.Kafa Admin.ParentTeacherList', compact('parents', 'teachers'));
    }


    public function showParentDetail($id)
    {
        // Retrieve the parent based on the provided ID
        $parent = Parents::findOrFail($id);

        // Pass the parent details to the view
        return view('ManageProfile.Kafa Admin.UserDetail', compact('parent'));
    }




    public function showTeacherDetail($id)
    {
        // Fetch the teacher details from the database based on the provided ID
        $teacher = Teacher::findOrFail($id);

        // Pass the teacher details to the view
        return view('ManageProfile.Kafa Admin.UserDetail', compact('teacher'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editParent($id)
    {
        $parent = $this->getParent($id);
        return view('ManageProfile.Kafa Admin.editProfile', compact('parent'));
    }

    public function editTeacher($id)
    {
        $teacher = $this->getTeacher($id);
        return view('ManageProfile.Kafa Admin.editProfile', compact('teacher'));
    }


    private function getParent(string $id)
    {
        return Parents::with('user')->find($id);
    }

    private function getTeacher(string $id)
    {
        return Teacher::find($id);
    }




    /**
     * Update the specified resource in storage.
     */
    public function updateParent(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parentIC' => 'nullable|string|max:255',
            'phoneNo' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'relation' => 'nullable|string|max:255',
        ]);

        $parent = Parents::find($id);
        if ($parent) {
            $parent->user->name = $request->input('name');
            $parent->parentIC = $request->input('parentIC');
            $parent->phoneNo = $request->input('phoneNo');
            $parent->address = $request->input('address');
            $parent->relation = $request->input('relation');
            $parent->user->save();
            $parent->save();

            return redirect()->route('profile.showParent', $id)->with('success', 'Details updated successfully');
        }

        return back()->with('error', 'Failed to update parent details.');
    }

    public function updateTeacher(Request $request, string $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'educationLevel' => 'nullable|string|max:255',
        ]);

        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->fullname = $request->input('fullname');
            $teacher->gender = $request->input('gender');
            $teacher->address = $request->input('address');
            $teacher->educationLevel = $request->input('educationLevel');
            $teacher->save();

            return redirect()->route('profile.showTeacher', $id)->with('success', 'Details updated successfully');
        }

        return back()->with('error', 'Failed to update teacher details.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        // Check if the ID belongs to a Parent
        $parent = Parents::find($id);
        if ($parent) {
            // Delete the parent's user
            $parent->user->delete();
            return back()->with('success', 'Parent deleted successfully');
        }

        // Check if the ID belongs to a Teacher
        $teacher = Teacher::find($id);
        if ($teacher) {
            // Delete the teacher's user
            $teacher->user->delete();
            return back()->with('success', 'Teacher deleted successfully');
        }

        // If no parent or teacher found with the given ID, return error
        return back()->with('error', 'User not found');
    }


}
