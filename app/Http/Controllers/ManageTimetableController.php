<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use Illuminate\Http\Request;

class ManageTimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ManageTimetable.Teacher.TimetableList');
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
        $request->validate([
            'title' => 'equired|max:255',
            'body' => 'equired',
        ]);
    
        $timetable = new Timetable();
        $timetable->title = $request->input('title');
        $timetable->body = $request->input('body');
        $timetable->save();
    
        return redirect()->route('timetables.index')
            ->with('success', 'Timetable created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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

    public function teacherTemplate()
    {
        return view('ManageTimetable.Teacher.TeacherTemplate');
    }
    public function timetablelist()
    {
        $timetables = Timetable::all(); // assuming you have a Timetable model
        return view('timetablelist', compact('timetables'));
    }
}
