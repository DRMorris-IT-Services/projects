
@extends('layouts.app')

@section('content')

<div class="content">
    @include('projectsmodule::layouts.alerts')
 
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">List</a>
  </li>
  @if (AUTH::user()->projects_add == "on")
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Project</a>
  </li>
  @endif
  
</ul>


        <div class="row">
        <div class="col-md-12 text-white">
        <h2 class="card-title">Projects</h2>
        
        </div>
        <br><br>
        <br><br>

<div class="tab-content col-md-12 text-white" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Ref No.</th>
                                        <th>Client</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Project Summary</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $p)
                                    <tr>
                                        <td><a href="{{route('projects.view',[$p->project_id])}}" >DR-{{$p->project_ref}}</a></td>
                                        <td>@foreach($clients as $c) @if($p->client_id == $c->client_id) {{$c->company}} @endif @endforeach</td>
                                        <td>{{ date('d/m/y', strtotime($p->start_date))}}</td>
                                        <td>{{ date('d/m/y', strtotime($p->due_date))}}</td>
                                        <td>{{$p->project_summary}}</td>
                                        <td>{{ $p->status}}</td>
                                        <td>
                                        @if (auth()->user()->projects_edit == "on")
                                        <a href="{{route('projects.edit',[$p->project_id])}}" ><button class="btn btn-sm fa fa-edit btn-outline-warning"></button></a>
                                        @endif
                                        @if(AUTH::user()->projects_del == "on")
                                        <button class="btn btn-sm btn-outline-danger"data-toggle="modal" data-target="#invoice_del{{$p->id}}"><i class="fa fa-trash"></i></button>

                                        <!-- MODAL DELETE PROJECT -->
                                        <form class="col-md-12" action="{{ route('projects.del',[$p->project_id]) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                
                                                <div class="modal fade" id="invoice_del{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header bg-dark text-white">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">REMOVE Project??</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark">
                                                    
                                                    <h3><i class="fa fa-warning" ></i> WARNING!!</h3>
                                                    <h5>You are going to remove this project and all the project tasks are you sure?</h5>
                                                    <h5>This action can <b><u>NOT BE UNDONE!</u></b></h5>
                                                        
                                                    </div>
                                                    <div class="modal-footer bg-dark text-white">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </form>

                                                <!-- END MODAL FOR DELETE CLIENT --> 
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>

                            </table>
                        
                    
            
    <!-- END OF TAB -->
    </div>

    <div class="tab-pane fade text-white" id="profile" role="tabpanel" aria-labelledby="profile-tab">


    <div class="col-md-12">
                
                        <h3>Start New Project</h3>
                        
                    </div>
                        
                        <form class="col-md-12" action="{{ route('projects.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')   
                        
<div class="container py-2">
<!-- timeline item 1 -->
<div class="row no-gutters">
    <div class="col-sm"> <!--spacer--> </div>
    <!-- timeline item 1 center dot -->
    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
        <div class="row h-50">
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
        <h5 class="m-2">
            <span class="badge badge-pill bg-light border bg-info">&nbsp;</span>
        </h5>
        <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
    </div>
    <!-- timeline item 1 event content -->
    <div class="col-sm py-2 text-white">
        
                
                <h4>1. Client</h4>
                <p class="card-text">Please select the client:</p>
                <div class="form-group">
                <select name="client" class="form-control bg-dark text-white" required><option>{{ old('client') }}</option>
                @foreach ($clients as $c)
                <option value="{{$c->client_id}}">{{ $c->company }}</option>
                @endforeach
                </select>
                @if ($errors->has('client'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('client') }}</strong>
                </span>
                @endif
                </div>
                                    
                                
            
    </div>
</div>
<!--/row-->
<!-- timeline item 2 -->
<div class="row no-gutters">
    <div class="col-sm py-2 text-white">
                
                <h4>2. Project Dates</h4>
                <p class="card-text">Please enter the dates for the project</p>
                <div class="form-group">
                <input type="text" name="start_date" class="form-control bg-dark text-white" placeholder="Start Date" value="{{ old('start_date') }}">
                @if ($errors->has('start_date'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('start_date') }}</strong>
                </span>
                @endif
                </div>
                <div class="form-group">
                <input type="text" name="due_date" class="form-control bg-dark text-white" placeholder="Due Date" value="{{ old('due_date') }}">
                @if ($errors->has('due_date'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('due_date') }}</strong>
                </span>
                @endif
                </div>
                
                
            
    </div>
    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
        <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
        <h5 class="m-2">
            <span class="badge badge-pill bg-info">&nbsp;</span>
        </h5>
        <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
    </div>
    <div class="col-sm"> <!--spacer--> </div>
</div>
<!--/row-->
<!-- timeline item 3 -->
<div class="row no-gutters">
    <div class="col-sm"> <!--spacer--> </div>
    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
        <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
        <h5 class="m-2">
            <span class="badge badge-pill bg-light border bg-info">&nbsp;</span>
        </h5>
        <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
    </div>
    <div class="col-sm py-2 text-white">
                
                <h4 class="card-title">3. Project Summary</h4>
                <p>Please tell us the brief summary of the project</p>
                <div class="form-group">
                <textarea name="project_summary" class="form-control bg-dark text-white" placeholder="Project Summary"  >{{ old('project_summary') }}</textarea>
                
        </div>
    </div>
</div>
<!--/row-->
<!-- timeline item 4 -->
<div class="row no-gutters">
    <div class="col-sm py-2 text-white">
                
                <h4>4. Save</h4>
                <p>Please now ensure you click the save button below to create the new client.</p>
                <input type="submit" value="save" class="btn btn-md btn-success">
                <a href="javascript:history.back()"><input type="button" value="cancel" class="btn btn-md btn-primary"></a>
            
    </div>
    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
        <div class="row h-50">
            <div class="col border-right">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
        <h5 class="m-2">
            <span class="badge badge-pill bg-light border bg-info">&nbsp;</span>
        </h5>
        <div class="row h-50">
            <div class="col">&nbsp;</div>
            <div class="col">&nbsp;</div>
        </div>
    </div>
    <div class="col-sm"> <!--spacer--> </div>
</div>


</form>
                
        </div>
    </div>
    
</div>

</div>
</div>

@endsection