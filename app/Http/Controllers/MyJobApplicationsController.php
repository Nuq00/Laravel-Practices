<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Job;
use Illuminate\Http\Request;


class MyJobApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job_applications.index', [
            'applications' => auth()->user()->jobApplications()
                ->with([
                    'job' => fn ($query) => $query->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary')->withTrashed(),
                    'job.employer'
                ])
                ->latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job application removed.'
        );
    }
}
