<?php

Route::group(['namespace' => 'duncanrmorris\projectsmodule\Http\Controllers'], function()
{
    Route::group(['middleware' => ['web', 'auth']], function(){
        #### PROJECTS MODULE ####
        Route::get('projects', 'ProjectsController@index')->name('projects');
        Route::get('projects/new', 'ProjectsController@create')->name('projects.new');
        Route::put('projects/add', 'ProjectsController@store')->name('projects.add');
        Route::get('projects/view/{id}', 'ProjectsController@show')->name('projects.view');
        Route::get('projects/edit/{id}', 'ProjectsController@edit')->name('projects.edit');
        Route::put('projects/update/{id}', 'ProjectsController@update')->name('projects.update');
        Route::put('projects/del/{id}', 'ProjectsController@destroy')->name('projects.del');

        #### PROJECTS TASKS ####
        Route::put('projects/tasks/add/{id}/{cid}', 'ProjectTaskController@store')->name('projects.addtask');
        Route::put('projects/tasks/update/{id}/{cid}', 'ProjectTaskController@update')->name('projects.updatetask');
        Route::put('projects/tasks/del/{id}/{cid}', 'ProjectTaskController@destroy')->name('projects.deltask');

   
        ### CONTROLS ###
        Route::get('projects/controls/{id}', 'ProjectscontrolsController@index')->name('projects.controls');
        Route::get('projects/controls/view/{id}', 'ProjectscontrolsController@show')->name('projects.controls.view');
        Route::get('projects/controls/setup/{id}', 'ProjectscontrolsController@create')->name('projects.controls.setup');
        Route::get('projects/controls/edit/{id}', 'ProjectscontrolsController@edit')->name('projects.controls.edit');
        Route::put('projects/controls/update/{id}', 'ProjectscontrolsController@update')->name('projects.controls.update');

    });
});