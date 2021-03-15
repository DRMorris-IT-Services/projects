<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

 #### PROJECTS MODULE ####
 Route::get('projects', 'ProjectsController@index')->name('projects')->middleware('auth');
 Route::get('projects/new', 'ProjectsController@create')->name('projects.new')->middleware('auth');
 Route::put('projects/add', 'ProjectsController@store')->name('projects.add')->middleware('auth');
 Route::get('projects/view/{id}', 'ProjectsController@show')->name('projects.view')->middleware('auth');
 Route::get('projects/edit/{id}', 'ProjectsController@edit')->name('projects.edit')->middleware('auth');
 Route::put('projects/update/{id}', 'ProjectsController@update')->name('projects.update')->middleware('auth');
 Route::put('projects/del/{id}', 'ProjectsController@destroy')->name('projects.del')->middleware('auth');

 #### PROJECTS TASKS ####
 Route::put('projects/tasks/add/{id}/{cid}', 'ProjectTaskController@store')->name('projects.addtask')->middleware('auth');
 Route::put('projects/tasks/update/{id}/{cid}', 'ProjectTaskController@update')->name('projects.updatetask')->middleware('auth');
 Route::put('projects/tasks/del/{id}/{cid}', 'ProjectTaskController@destroy')->name('projects.deltask')->middleware('auth');
