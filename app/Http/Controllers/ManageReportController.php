<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\PostMortem;
use App\Models\Student;
use App\Models\Result;
use App\Models\Subject;
use Carbon\Carbon;

class ManageReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('postMortems')->get();

        return view('ManageReportActivity.KAFA Admin.ViewActivityList', compact('activities'));
    }

    public function indexMuip()
    {
        $activities = Activity::with('postMortems')->get();

        return view('ManageReportActivity.MUIP Admin.ViewActivityList', compact('activities'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $activity = Activity::findOrFail($id);
        return view('ManageReportActivity.KAFA Admin.AddPostMortemForm', ['activity' => $activity]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'postDescription' => 'required|string',
        ]);

        $activity = Activity::findOrFail($id);

        // Create a new post-mortem instance
        $postMortem = new PostMortem();
        $postMortem->postDescription = $validatedData['postDescription'];
        $postMortem->postDate = Carbon::now(); // Set the current time as the post date
        $postMortem->postStatus = 'Finished'; // Set the status to Finished

        // Assign the activity to the post-mortem
        $postMortem->activity()->associate($activity);
        $postMortem->save();

        // Redirect back to the activity page or any other page as needed
        return redirect()->route('report.ViewCompletePostMortem', $activity->id)->with('success', 'Post-Mortem created successfully');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = Activity::findOrFail($id);
        return view('ManageReportActivity.KAFA Admin.ViewActivityDetail', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);

        // Check if the activity has a finished status
        if ($activity->postMortems()->exists()) {
            $postMortem = $activity->postMortems()->latest()->first();
            if ($postMortem->postStatus == 'Finished') {
                // Allow editing the activity
                return view('ManageReportActivity.KAFA Admin.EditPostMortemForm', compact('activity', 'postMortem'));
            }
        }

        // Redirect back with a message if editing is not allowed
        return redirect()->route('report.ViewActivityDetail', $activity->id)->with('error', 'Editing not allowed for activities with ongoing status.');
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, $postMortemId)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'postDescription' => 'required|string',
        ]);

        // Find the post-mortem
        $postMortem = PostMortem::findOrFail($postMortemId);
        $postMortem->postDescription = $validatedData['postDescription'];
        $postMortem->save();

        // Redirect back to the post-mortem view page with success message
        return redirect()->route('report.ViewCompletePostMortem', $id)->with('success', 'Post-Mortem updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function showPostMortem($id)
    {
        $activity = Activity::with('postMortems')->findOrFail($id);

        return view('ManageReportActivity.KAFA Admin.ViewCompletePostMortem', compact('activity'));
    }

    public function showPostMortemMuip($id)
    {
        $activity = Activity::with('postMortems')->findOrFail($id);

        return view('ManageReportActivity.MUIP Admin.ViewCompletePostMortem', compact('activity'));
    }

    public function showYears()
    {

        $years = Student::select('studentYear')->distinct()->orderBy('studentYear')->pluck('studentYear');

        return view('ManageReportActivity.MUIP Admin.ViewAcademicLevelOption', compact('years'));
    }

    public function showStudentsByYear($year)
    {
        $students = Student::where('studentYear', $year)->get();
        return view('ManageReportActivity.MUIP Admin.ViewStudentList', ['students' => $students, 'year' => $year]);
    }



    public function viewAcademicPerformance($studentIC)
    {
        // Assuming you want to get results for a specific student
        $results = Result::where('studentIC', $studentIC)->with('subject')->get();
        $subjects = Subject::all(); // Retrieve all subjects

        return view('ManageReportActivity.MUIP Admin.ViewAcademicPerformance', compact('results', 'subjects'));
    }
}
