<?php

namespace App\Http\Controllers;

use App\Task;
use App\Job;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Job $job)
    {
        $this->validate($request, [
            'user' => 'required',
            'role' => 'required'
        ]);
        $task = new Task;
        $task->job()->associate($job);
        $task->user()->associate($request->user);
        $task->role()->associate($request->role);
        $task->save();

        
        return redirect('/jobs/'.$job->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job, Task $task)
    {
        $this->validate($request, [
            'user' => 'required',
            'role' => 'required'
        ]);

        $user = $request->user;
        $role = $request->role;

        $task->user()->associate($user);
        $task->role()->associate($role);
        $task->save();

        
        return redirect('/jobs/'.$task->job->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job, Task $task)
    {
        $task->delete();

        return redirect('/jobs/'.$task->job->id);
    }
}
