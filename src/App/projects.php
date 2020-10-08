<?php

namespace duncanrmorris\projectsmodule\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class projects extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'client_id', 'start_date', 'due_date', 'project_summary', 'project_ref', 'status',
    ];
}
