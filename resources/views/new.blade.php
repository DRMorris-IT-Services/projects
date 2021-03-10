
@extends('layouts.app')

@section('content')

    <div class="content">
        @include('projectsmodule::layouts.alerts')
    
        <div class="row">
        <div class="col-md-12 ">
        
        @if (AUTH::user()->projects_add == "on")
        <a href="{{route('projects.new')}}"><button class="fa fa-plus btn btn-md  btn-info"></button></a>
        @endif
        </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Start New Project</h5>
                        
                    </div>
                        <div class="card-body">
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
    <div class="col-sm py-2">
        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title text-muted">1. Client</h4>
                <p class="card-text">Please select the client:</p>
                <div class="form-group">
                <select name="client" class="form-control" required><option>{{ old('client') }}</option>
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
    </div>
</div>
<!--/row-->
<!-- timeline item 2 -->
<div class="row no-gutters">
    <div class="col-sm py-2">
        <div class="card border-info shadow">
            <div class="card-body">
                
                <h4 class="card-title text-muted">2. Project Dates</h4>
                <p class="card-text">Please enter the dates for the project</p>
                <div class="form-group">
                <input type="text" name="start_date" class="form-control" placeholder="Start Date" value="{{ old('start_date') }}">
                @if ($errors->has('start_date'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('start_date') }}</strong>
                </span>
                @endif
                </div>
                <div class="form-group">
                <input type="text" name="due_date" class="form-control" placeholder="Due Date" value="{{ old('due_date') }}">
                @if ($errors->has('due_date'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('due_date') }}</strong>
                </span>
                @endif
                </div>
                
                
            </div>
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
    <div class="col-sm py-2">
        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title">3. Project Summary</h4>
                <p>Please tell us the brief summary of the project</p>
                <div class="form-group">
                <textarea name="project_summary" class="form-control" placeholder="Project Summary"  >{{ old('project_summary') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/row-->
<!-- timeline item 4 -->
<div class="row no-gutters">
    <div class="col-sm py-2">
        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title">4. Save</h4>
                <p>Please now ensure you click the save button below to create the new client.</p>
                <input type="submit" value="save" class="btn btn-md btn-success">
                <a href="javascript:history.back()"><input type="button" value="cancel" class="btn btn-md btn-primary"></a>
            </div>
        </div>
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