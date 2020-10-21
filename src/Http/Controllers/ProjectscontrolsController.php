<?php
 
namespace duncanrmorris\projectsmodule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use App\User;

use duncanrmorris\projectsmodule\App\projectcontrols;


class ProjectscontrolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users, projectcontrols $projectcontrols, $id)
    {
        //

        return view('projectsmodule::controls.list',[
            'users' => $users->get(),
            'check' => $projectcontrols->where('user_id',$id)->count(),
            'controls' => $projectcontrols->where('user_id',$id)->get(),
            ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(projectcontrols $projectcontrols, $id)
    {
        //
        projectcontrols::create([
            'user_id' => $id,
            'project_admin' => 'on',
        ]);

        return back()->withStatus(__('Access Levels successfully updated.'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function show(projectcontrols $projectcontrols, User $user, $id)
    {
        //
        return view('projectsmodule::controls.view',[
            'count' => $projectcontrols->where('user_id',$id)->count(),
            'controls' => $projectcontrols->where('user_id',$id)->get(),
            'user' => $user->where('id',$id)->get()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function edit(projectcontrols $projectcontrols, User $user, $id)
    {
        //
        return view('projectsmodule::controls.edit',[
            'count' => $projectcontrols->where('user_id',$id)->count(),
            'controls' => $projectcontrols->where('user_id',$id)->get(),
            'user' => $user->where('id',$id)->get()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projectcontrols $projectcontrols, $id)
    {
        //

        projectcontrols::where('id',$id)
        ->update([
        'project_admin' => $request['admin'],
        'project_view' => $request['view'],
        'project_add' => $request['new'],
        'project_edit' => $request['edit'],
        'project_download' => $request['download'],
        'project_del' => $request['del'],
        ]);
        return back()->withStatus(__('Access Levels successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $backupcontrols)
    {
        //
    }
}
