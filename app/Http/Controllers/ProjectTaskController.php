<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use App\project_task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectTaskController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cid, $id)
    {
        //
        
        $validatedData = $request->validate([
            'task_summary' => 'required',
            'task_start_date' => 'required|date|date_format:Y-m-d',
            'task_due_date' => 'required|date|date_format:Y-m-d',
            
        ]);

        project_task::create([
            'user_id' => AUTH::user()->id,
            'project_id' => $cid,
             'client_id' => $id,
             'start_date' => $request['task_start_date'],
             'due_date' => $request['task_due_date'],
             'task_summary' => $request['task_summary'],
             'task_description' => $request['task_details'],
             'task_percent_completed' => $request['task_percent_completed'],
             'status' => "Backlog",
         ]); 

         return redirect("projects/edit/$cid")->withstatus('Project Task Successfully Created');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project_task  $project_task
     * @return \Illuminate\Http\Response
     */
    public function show(project_task $project_task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project_task  $project_task
     * @return \Illuminate\Http\Response
     */
    public function edit(project_task $project_task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project_task  $project_task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project_task $project_task, $id, $cid)
    {
        //

        $validatedData = $request->validate([
            'edit_task_summary' => 'required',
            'edit_task_start_date' => 'required|date|date_format:Y-m-d',
            'edit_task_due_date' => 'required|date|date_format:Y-m-d',
            
        ]);

        project_task::where('id',$id)
            ->update([
             'start_date' => $request['edit_task_start_date'],
             'due_date' => $request['edit_task_due_date'],
             'task_summary' => $request['edit_task_summary'],
             'task_description' => $request['task_details'],
             'task_percent_completed' => $request['task_percent_completed'],
             'status' => $request['status'],
         ]); 

        return redirect("projects/view/$cid")->withstatus('Project Task Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project_task  $project_task
     * @return \Illuminate\Http\Response
     */
    public function destroy(project_task $project_task, $id, $cid)
    {
        //
        project_task::where('id',$id)
        ->delete();


        return redirect("projects/edit/$cid")->withdelete(__('Project Task successfully removed.'));
    }
}
