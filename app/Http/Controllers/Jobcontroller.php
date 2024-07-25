<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search']??null;
        $min_salary = $request['min_salary']??null;
        $max_salary = $request['max_salary']??null;
        $experience = $request['experience']??null;
        $category = $request['category']??null;
        $jobs = Job::query();

        if (!empty($search)) {
           
            $jobs->where('title', 'like', '%' . $search . '%')
                 ->orWhere('description', 'like', '%' . $search . '%');
        }
        if (!(empty($max_salary)) && !empty($min_salary)) {
            $jobs->whereBetween('salary', [$min_salary, $max_salary]);
        } elseif (!empty($min_salary)) {
            $jobs->where('salary', '>=', $min_salary);
        } elseif (!empty($max_salary)) {
            $jobs->where('salary', '<=', $max_salary);
        }
        if(!empty($experience)) {
            $jobs->where('experience', $experience);
        }
        if(!empty($category)) {
            $jobs->where('category', $category);
        }
        return view('job.index', ['jobs' => $jobs->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Code for creating a new job
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Code for storing a new job
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Code for editing a job
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Code for updating a job
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Code for deleting a job
    }
}
