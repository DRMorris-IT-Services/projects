@extends('layouts.app')
@foreach ($project as $p)
@section('header')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function daysToMilliseconds(days) {
      return days * 24 * 60 * 60 * 1000;
    }

    function drawChart() {


      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');

      data.addRows([
        @foreach($project_tasks as $pg)
        [
            '{{$pg->id}}',
        '{{$pg->task_summary}}',
        new Date('{{$pg->start_date}}'),
        new Date('{{$pg->due_date}}'),
        null,
        {{$pg->task_percent_completed}},
        null
        ],
        @endforeach
        
      ]);

      var options = {
        height: 350,
        gantt: {
          trackHeight: 30,
          defaultStartDateMillis: new Date(2020, 11, 1)
        }
      };
      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
@endsection
@section('content')


<div class="container">
   



    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="home-tab"  href="{{route('projects')}}" role="tab" aria-controls="home" aria-selected="true"><b><i class="fa fa-list"></i> List</b></a>
          </li>
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> <b><i class="fa fa-info-circle"></i> Details</b></a>
      </li>
      <li class="nav-item">
        @if ($errors->has('edit_task_start_date') or $errors->has('edit_task_due_date')) <a class="nav-link bg-warning text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><b><i class="fa fa-tasks"></i>Tasks</b> ({{$tasks}})
            @else <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><b><i class="fa fa-tasks"></i> Tasks </b> ({{$tasks}}) @endif
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><b><i class="fa fa-file"></i> Documents</b></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" id="gantt-tab" data-toggle="tab" href="#gantt" role="tab" aria-controls="gantt" aria-selected="false"><b><i class="fa fa-dashboard"></i> Gantt Chart</b></a>
      </li>
      
      <li class="nav-item">
        @if ($errors->has('task_start_date') or $errors->has('task_due_date'))<a class="nav-link bg-warning text-dark" id="newtask-tab" data-toggle="tab" href="#newtask" role="tab" aria-controls="newtask" aria-selected="false"><b><i class="fa fa-plus-square"></i> New Task</b>
            @else <a class="nav-link bg-success text-white" id="newtask-tab" data-toggle="tab" href="#newtask" role="tab" aria-controls="newtask" aria-selected="false"><b><i class="fa fa-plus-square"></i> New Task</b>  @endif 
        </a>
      </li>
      
    </ul>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Project Details - DR-{{$p->project_ref}}</h3></div>

                <div class="card-body">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-4">
                           
                                    <h5>Client</h5>
                                 
                                   @foreach ($client as $c){{ $c->company }}@endforeach
                                  
                                    <br><br>
                                    <h6>Project Reference: DR-{{$p->project_ref}}</h6>
                                
                           
                        </div>
            
                        <div class="col-md-4">
                            
                                    <h5>Dates</h5>
                                    
                              
                                    <h6>Start Date: {{ date('d/m/y', strtotime($p->start_date))}}</h6>
                                           
                                    <h6>Due Date: {{ date('d/m/y', strtotime($p->due_date))}}</h6>
                                            
                                    <h6>Created On: {{ date('d/m/y @ H:i', strtotime($p->created_at)) }}</h6>
                                    <h6>Updated On: {{ date('d/m/y @ H:i', strtotime($p->updated_at)) }}</h6>
                               
                        </div>
            
                        
            
                        <div class="col-md-4">
                            
                                    <h5>Status</h5>
                                    
                               
            
                                   {{ $p->status}}
                                    
                                    
                                
                        </div>
                    </div>
            
            
                    <br><br>
            
                    
                        <div class="row">
                            <div class="col-md-12">
                            
                                    <h5>Project Summary</h5>
                              
                                        {{$p->project_summary}}
                                    
                                    
                                    
                                    
                            </div>
                        </div>
            </div>
            
                       
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                            <div class="col-md-12">
                           
                                    <h5>Project Tasks</h5>
                                  
                                    <table class="table">
                                    <thead class="text-primary">
                                                <tr>
                                                    <th>Task Summary</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Task Description</th>
                                                    <th>Percent Completed</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($project_tasks as $task)

                                            @if($task->status == "Completed")

                                            <tr>
                                            <td class="bg-light text-dark">{{$task->task_summary}}</td>
                                                  <td class="bg-light text-dark">{{$task->start_date}}</td>
                                                  <td class="bg-light text-dark">{{$task->due_date}}</td>
                                                  <td class="bg-light text-dark">{{$task->task_description}}</td>
                                                  <td class="bg-light text-dark text-right">{{$task->task_percent_completed}}%
                                                  <div class="progress">
                                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{$task->task_percent_completed}}%" aria-valuenow="{{$task->task_percent_completed}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                  </td>
                                                  <td class="bg-light text-dark">{{$task->status}}</td>
                                                  <td>
                                                  <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#task_edit{{$task->id}}"><i class="fa fa-edit"></i></button>
                                                    <!-- MODAL EDIT CONTACT -->
                                                    
                                                    
                                                    <div class="modal fade" id="task_edit{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header card-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Task</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('projects.updatetask',['id' => $task->id, 'cid' => $task->project_id]) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
            
                                                                    <div class="modal-body">
                                                        
                                                                                <div class="form-group">
                                                                                <label>Task Summary</label>
                                                                                <input type="text" class="form-control col-12 " name="edit_task_summary" value="{{ $task->task_summary}}" required>
                                                                                @if ($errors->has('edit_task_summary'))
                                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                      <strong>{{ $errors->first('edit_task_summary') }}</strong>
                                                                                      </span>
                                                                                      @endif
                                                                                </div>
            
                                                                                <div class="form-group">
                                                                                <label>Start Date</label>
                                                                                <input type="text" class="form-control col-6 " name="edit_task_start_date" value="{{ $task->start_date }}">
                                                                                    @if ($errors->has('edit_task_start_date'))
                                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                      <strong>{{ $errors->first('edit_task_start_date') }}</strong>
                                                                                      </span>
                                                                                      @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                <label>Due Date</label>
                                                                                <input type="text" class="form-control col-6 " name="edit_task_due_date" value="{{ $task->due_date }}">
                                                                                @if ($errors->has('edit_task_due_date'))
                                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                      <strong>{{ $errors->first('edit_task_due_date') }}</strong>
                                                                                      </span>
                                                                                      @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                <label>Percentage Completed</label>
                                                                                <select class="form-control col-12" name="task_percent_completed">
                                                                                <option value="{{$task->task_percent_completed}}">{{$task->task_percent_completed}}%</option>
                                                                                <option>--------</option>
                                                                                <option value="0">0%</option>
                                                                                <option value="5">5%</option>
                                                                                <option value="10">10%</option>
                                                                                <option value="25">25%</option>
                                                                                <option value="50">50%</option>
                                                                                <option value="75">75%</option>
                                                                                <option value="100">100%</option>
                                                                                </select>
            
                                                                                </div>
                                                                                <div class="form-group">
                                                                                <label>Task Details</label>
                                                                                <textarea class="form-control col-md-12 " name="task_details" >{{$task->task_description}}</textarea>
                                                                                </div>
            
                                                                                <div class="form-group">
                                                                                <label>Status</label>
                                                                                <select class="form-control col-12 " name="status">
                                                                                <option>{{$task->status}}</option>
                                                                                <option>--------</option>
                                                                                <option>In Progress</option>
                                                                                <option>Stalled</option>
                                                                                <option>On Hold</option>
                                                                                <option>Part Completed<option>
                                                                                <option>Completed<option>
                                                                                </select>
            
                                                                                </div>
                                                                                
                                                                    </div>
                                                                        <div class="modal-footer card-footer">
                                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                                                        </div>
                                                                   </form>
                                                              </div>
                                                          </div>
                                                      </div>
                                                   
            
                                                    <!-- END MODAL FOR EDIT CONTACT --> 
            
            
                                                    <button class="btn btn-sm btn-outline-danger"data-toggle="modal" data-target="#contact_del{{$task->id}}"><i class="fa fa-trash"></i></button>
            
                                                        <!-- MODAL DELETE CONTACT -->
                                                        <form class="col-md-12" action="{{ route('projects.deltask',['id' => $task->id, 'cid' => $task->project_id]) }}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                
                                                                <div class="modal fade" id="contact_del{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header bg-danger text-white">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">REMOVE Project Task ??</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    
                                                                    <h3><i class="fa fa-warning" ></i> WARNING!!</h3>
                                                                    <h5>You are going to remove this project task, are you sure?</h5>
                                                                    <h5>This action can <b><u>NOT BE UNDONE!</u></b></h5>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer card-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </form>
            
                                                                <!-- END MODAL FOR DELETE CONTACT --> 
                                                  </td>
                                                </tr>


                                            @else
                                                <tr>
                                                  <td>{{$task->task_summary}}</td>
                                                  <td>{{$task->start_date}}</td>
                                                  <td>{{$task->due_date}}</td>
                                                  <td>{{$task->task_description}}</td>
                                                  <td class="text-right">{{$task->task_percent_completed}}%
                                                  <div class="progress">
                                                  <div class="progress-bar bg-info" role="progressbar" style="width: {{$task->task_percent_completed}}%" aria-valuenow="{{$task->task_percent_completed}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                  </td>
                                                  <td>{{$task->status}}</td>
                                                  <td>
                                                  <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#task_edit{{$task->id}}"><i class="fa fa-edit"></i></button>
                                                    <!-- MODAL EDIT CONTACT -->
                                                    
                                                    
                                                    <div class="modal fade" id="task_edit{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header card-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Task</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('projects.updatetask',['id' => $task->id, 'cid' => $task->project_id]) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
            
                                                                    <div class="modal-body">
                                                        
                                                                                <div class="form-group">
                                                                                <label>Task Summary</label>
                                                                                <input type="text" class="form-control col-12 " name="edit_task_summary" value="{{ $task->task_summary}}" required>
                                                                                @if ($errors->has('edit_task_summary'))
                                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                      <strong>{{ $errors->first('edit_task_summary') }}</strong>
                                                                                      </span>
                                                                                      @endif
                                                                                </div>
            
                                                                                <div class="form-group">
                                                                                <label>Start Date</label>
                                                                                <input type="text" class="form-control col-6 " name="edit_task_start_date" value="{{ $task->start_date }}">
                                                                                    @if ($errors->has('edit_task_start_date'))
                                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                      <strong>{{ $errors->first('edit_task_start_date') }}</strong>
                                                                                      </span>
                                                                                      @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                <label>Due Date</label>
                                                                                <input type="text" class="form-control col-6 " name="edit_task_due_date" value="{{ $task->due_date }}">
                                                                                @if ($errors->has('edit_task_due_date'))
                                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                      <strong>{{ $errors->first('edit_task_due_date') }}</strong>
                                                                                      </span>
                                                                                      @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                <label>Percentage Completed</label>
                                                                                <select class="form-control col-12" name="task_percent_completed">
                                                                                <option value="{{$task->task_percent_completed}}">{{$task->task_percent_completed}}%</option>
                                                                                <option>--------</option>
                                                                                <option value="0">0%</option>
                                                                                <option value="5">5%</option>
                                                                                <option value="10">10%</option>
                                                                                <option value="25">25%</option>
                                                                                <option value="50">50%</option>
                                                                                <option value="75">75%</option>
                                                                                <option value="100">100%</option>
                                                                                </select>
            
                                                                                </div>
                                                                                <div class="form-group">
                                                                                <label>Task Details</label>
                                                                                <textarea class="form-control col-md-12 " name="task_details" >{{$task->task_description}}</textarea>
                                                                                </div>
            
                                                                                <div class="form-group">
                                                                                <label>Status</label>
                                                                                <select class="form-control col-12 " name="status">
                                                                                <option>{{$task->status}}</option>
                                                                                <option>--------</option>
                                                                                <option>In Progress</option>
                                                                                <option>Stalled</option>
                                                                                <option>On Hold</option>
                                                                                <option>Part Completed<option>
                                                                                <option>Completed<option>
                                                                                </select>
            
                                                                                </div>
                                                                                
                                                                    </div>
                                                                        <div class="modal-footer card-footer">
                                                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                                                        </div>
                                                                   </form>
                                                              </div>
                                                          </div>
                                                      </div>
                                                   
            
                                                    <!-- END MODAL FOR EDIT CONTACT --> 
            
            
                                                    <button class="btn btn-sm btn-outline-danger"data-toggle="modal" data-target="#contact_del{{$task->id}}"><i class="fa fa-trash"></i></button>
            
                                                        <!-- MODAL DELETE CONTACT -->
                                                        <form class="col-md-12" action="{{ route('projects.deltask',['id' => $task->id, 'cid' => $task->project_id]) }}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')
                                                                
                                                                <div class="modal fade" id="contact_del{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header bg-danger text-white">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">REMOVE Project Task ??</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    
                                                                    <h3><i class="fa fa-warning" ></i> WARNING!!</h3>
                                                                    <h5>You are going to remove this project task, are you sure?</h5>
                                                                    <h5>This action can <b><u>NOT BE UNDONE!</u></b></h5>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer card-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </form>
            
                                                                <!-- END MODAL FOR DELETE CONTACT --> 
                                                  </td>
                                                </tr>

                                                @endif
                                            @endforeach
                                            </tbody>
                                    </table>
                              
                            </div>
                    </div>
            </div>
            
                    
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-md-12">
                            
                                    <h5>Project Documents</h5>
                                    
                                    
                              
                            </div>
                        </div>
            </div>
            
            <div class="tab-pane fade" id="gantt" role="tabpanel" aria-labelledby="gantt-tab">
            <h2>Project Overview</h2>
            <div id="chart_div"></div>
            </div>
            
            <div class="tab-pane fade" id="newtask" role="tabpanel" aria-labelledby="newtask-tab">
            <div class="row">
                            <div class="col-md-12">
                            
                                    <h5>New Project Task</h5>
                                    
                                    <form  action="{{ route('projects.addtask',['id' => $p->project_id, 'cid' => $p->client_id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')  
            
                                      <label>Task Summary</label>
                                      <input type="text" class="form-control col-12" name="task_summary" value="{{ old('task_summary') }}" required>
                                      @if ($errors->has('task_summary'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('task_summary') }}</strong>
                                            </span>
                                            @endif
                                      <br>
                                      <label>Start Date</label>
                                      <input type="text" class="form-control col-12" name="task_start_date" value="{{ old('task_start_date') }}">
                                          @if ($errors->has('task_start_date'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('task_start_date') }}</strong>
                                            </span>
                                            @endif
                                      <br>
                                      <label>Due Date</label>
                                      <input type="text" class="form-control col-12" name="task_due_date" value="{{ old('task_due_date') }}">
                                      @if ($errors->has('task_due_date'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('task_due_date') }}</strong>
                                            </span>
                                            @endif
                                      <br>
                                      <label>Percentage Completed</label>
                                      <select class="form-control col-12" name="task_percent_completed"><option value="0">0%</option>
                                      <option value="5">5%</option>
                                      <option value="10">10%</option>
                                      <option value="25">25%</option>
                                      <option value="50">50%</option>
                                      <option value="75">75%</option>
                                      <option value="100">100%</option>
                                      </select>
            
                                      <br>
                                      <label>Task Details</label>
                                      <textarea class="form-control col-md-12" name="task_details" ></textarea>
            
            
                                        <br><br>
                                        
                                        <div class="modal-footer card-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                        </div>
            
                                    </form>
                                    
                               
                            </div>
                        </div>
            

            </div>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
   

@endforeach
@endsection