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
        <h3 class="panel-title">Edit bus</h3>
    </div>
    <div class="panel-body">
    <form class="form-horizontal" action="{{ route('updatebus',$bus->id) }}" method="POST">
    
        {{ csrf_field() }}        
        <fieldset>

          <div class="form-group">
          <label for="uname" class="col-md-2 control-label">Bus Name</label>

          <div class="col-md-10">
          <input type="text" class="form-control" name="name" value="{{ $bus->name }}" placeholder="operator">
          </div>
        </div>

        <div class="form-group">
          <label for="lastname" class="col-md-2 control-label">Location</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="location" value="{{ $bus->location }}" placeholder="location">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail" class="col-md-2 control-label">Seat Row</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="seat_row" id="name" value="{{ $bus->seat_row }}" placeholder="seat_row">
          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-md-2 control-label">seat column</label>

          <div class="col-md-10">
            <input type="text" class="form-control" name="seat_column" value="{{ $bus->seat_column }}" placeholder="location">
          </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-md-2 control-label">company</label>
  
            <div class="col-md-10">
              <input type="text" class="form-control" name="company" value="{{ $bus->company }}" placeholder="location">
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
