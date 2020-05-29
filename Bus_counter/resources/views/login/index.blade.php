<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	@extends('layouts.log')

	@section('content')
	<div class="container">
		<h1>Login Page</h1>
		
		
	@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-dismissible alert-danger">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Oh snap!</strong>{{ $error }}
				</div>
			@endforeach
		@endif


	<form method="post" >
		@csrf
<!-- 		{{csrf_field()}} -->		
<!-- 		<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
		Username: <input type="text" name="uname" > <br>
        Password: <input type="password" name="password" ><br>
        Type:   <select name="type" id="Type" style="width: 10%;">
            <option selected hidden disabled >Select Position</option>
             <option value="admin">Admin</option>
             <option value="manager">Bus Manager</option>
           </select><br>
<br>
		<input type="submit" name="submit" value="Submit" >
	</form>

	<h3>{{session('msg')}}</h3>

	
</div>
	
		
@endsection

</body>
</html>