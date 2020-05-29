@extends('layouts.app')

@section('content')
	<div class="container">

        @if ($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-dismissible alert-danger">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Oh snap!</strong>{{ $error }}
				</div>
			@endforeach
		@endif

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Edit counter</h3>
    </div>
    <div class="panel-body">
    <form class="form-horizontal" action="{{ route('updatecounter',$counter->id) }}" method="POST">
    
        {{ csrf_field() }}        
        <fieldset>

          <div class="form-group">
          <label for="uname" class="col-md-2 control-label">Operator Name</label>

          <div class="col-md-10">
          <input type="text" class="form-control" name="operator" value="{{ $counter->operator }}" placeholder="operator">
          </div>
        </div>

        <div class="form-group">
          <label for="lastname" class="col-md-2 control-label">Manager</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="manager" value="{{ $counter->manager }}" placeholder="Manager">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Counter Name</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="name" id="name" value="{{ $counter->name }}" placeholder="Name">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Location</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="location" value="{{ $counter->location }}" placeholder="location">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <button type="button" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </fieldset>
    </form>


</div>
</div>
</div>

@endsection
