<?php

namespace duncanrmorris\projectsmodule\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use duncanrmorris\projectsmodule\App\projects;
use duncanrmorris\projectsmodule\App\clients;
use duncanrmorris\projectsmodule\App\project_task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(projects $projects, clients $clients)
    {
        //

        return view('projectsmodule::projects',['projects' => $projects->orderby('project_ref', 'DESC')->get(), 'clients' => $clients->orderby('company','ASC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(clients $clients)
    {
        //
        
        return view('projectsmodule::new',['clients' => $clients->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id = Str::random(60);
        $project_id = projects::select()->orderby('project_ref', 'DESC')->first();

        if ($project_id == "")
        {
            $pid = '1';
        }else{
            $pid = $project_id->project_ref +1 ;
        }

        $validatedData = $request->validate([
            'client' => 'required',
            'start_date' => 'required|date|date_format:Y-m-d',
            'due_date' => 'required|date|date_format:Y-m-d',
            
        ]);

       projects::create([
           'project_ref' => $pid,
           'project_id' => $id,
            'client_id' => $request['client'],
            'start_date' => $request['start_date'],
            'due_date' => $request['due_date'],
            'project_summary' => $request['project_summary'],
            'status' => "Pending Review",
        ]); 

        
        return redirect('/projects')->withstatus('Project Successfully Created');
            

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects, clients $clients, $id, project_task $tasks)
    {
        //
        $client = clients::join('projects','clients.client_id', '=', 'projects.client_id')
        ->select('clients.company','clients.client_id')->where('project_id',$id)->get();
        return view('projectsmodule::view', ['project' => $projects->where('project_id', $id)->get(), 'client' => $client, 'clients' => $clients->get(),
        'tasks' => $tasks->where('project_id', $id)->count(),'project_tasks' => $tasks->where('project_id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects, clients $clients, $id, project_task $tasks)
    {
        //
        $client = clients::join('projects','clients.client_id', '=', 'projects.client_id')
        ->select('clients.company','clients.client_id')->where('project_id',$id)->get();

        return view('projectsmodule::edit',['project' => $projects->where('project_id', $id)->get(), 'clients' => $clients->get(), 'client' => $client,
        'tasks' => $tasks->where('project_id', $id)->count(), 'project_tasks' => $tasks->where('project_id', $id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $projects, $id)
    {
        //

        $validatedData = $request->validate([
            
            'start_date' => 'required|date|date_format:Y-m-d',
            'due_date' => 'required|date|date_format:Y-m-d',
            
        ]);

        projects::where('project_id',$id)
            ->update([
            'client_id' => $request['client'],
            'project_ref' => $request['project_ref'],
            'start_date' => $request['start_date'],
            'due_date' => $request['due_date'],
            'project_summary' => $request['project_summary'],
            'status' => $request['status'],
            
            ]);

            return back()->withStatus(__('Project successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects, $id)
    {
        //

        projects::where('project_id',$id)
        ->delete();


        return back()->withdelete(__('Project successfully removed.'));
    }
}
