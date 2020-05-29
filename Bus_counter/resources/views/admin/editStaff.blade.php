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
        <h3 class="panel-title">Edit Staff</h3>
    </div>
    <div class="panel-body">
    <form class="form-horizontal" action="{{ route('updateStaff',$staff->id) }}" method="POST">
    
        {{ csrf_field() }}        
        <fieldset>

          <div class="form-group">
          <label for="uname" class="col-md-2 control-label">User Name</label>

          <div class="col-md-10">
          <input type="text" class="form-control" name="uname" value="{{ $staff->username }}" placeholder="User Name">
          </div>
        </div>

        <div class="form-group">
          <label for="lastname" class="col-md-2 control-label">password</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="password" value="{{ $staff->password }}" placeholder="Password">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Email</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="type" id="inputEmail" value="{{ $staff->type }}" placeholder="Type">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">Name</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="name" value="{{ $staff->name }}" placeholder="Name">
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
