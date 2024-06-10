<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
