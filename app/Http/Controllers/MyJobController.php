<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use App\Models\Job;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        return view('my_job.index', [
            'jobs' => auth()->user()->employer
                ->jobs()->with(['employer', 'jobApplications', 'jobApplications.user'])
                ->withTrashed()
                ->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $this->authorize('create', Job::class);
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'location' => 'required|string|max:255',
        //     'salary' => 'required|numeric|min:5000',
        //     'description' => 'required|string',
        //     'experience' => 'required|in:' . implode(',', Job::$experience),
        //     'category' => 'required|in:' . implode(',', Job::$category),
        // ]);
        auth()->user()->employer->jobs()->create($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job created succesfully!');
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
    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        // if ($myJob->trashed()) {
        //     // $myJob->restore();
        //     // $myJob->update(
        //     //     $request->validated()
        //     // );
        //     return redirect()->route('my-jobs.index')->with('success', 'Job restored!');
        // }
        return view('my_job.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        if ($myJob->trashed()) {
            $myJob->restore();
        }
        $myJob->update(
            $request->validated()
        );
        return redirect()->route('my-jobs.index')->with('success', 'Job updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        $myJob->delete();

        return redirect()->route('my-jobs.index')->with('success', 'Job Deleted!');
    }
}
