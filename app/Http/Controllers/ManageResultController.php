<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Student;

class ManageResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all data from the 'results' table
        $results = Result::all();

        // Pass the data to the view
        return view('ManageStudentResult.Parents.parentsatu', compact('results'));
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
    

    public function searchStudentForm()
    {
        return view('ManageStudentResult.Teacher.searchstudent');
    }

    public function searchStudent(Request $request)
    {
        $request->validate([
            'studentName' => 'required|string|max:255',
        ]);

        $studentName = $request->input('studentName');
        $students = Student::where('studentName', 'LIKE', "%{$studentName}%")->get();

        return view('ManageStudentResult.Teacher.searchstudent', compact('students', 'studentName'));
    }
    public function addResult()
{
    return view('ManageStudentResult.Teacher.addResult');
}
}
