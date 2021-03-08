<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class project_task extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'project_id', 'client_id', 'start_date', 'due_date', 'task_summary', 'task_description', 'task_percent_completed', 'assigned_user_id', 'status',
    ];
}
