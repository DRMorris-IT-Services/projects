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

Route::get('/releasenotes', 'HomeController@releasenotes')->name('releasenotes');
Route::get('/help', 'HomeController@help')->name('help');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
