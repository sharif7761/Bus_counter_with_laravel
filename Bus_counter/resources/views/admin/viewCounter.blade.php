@extends('layouts.app')

@section('content')
    <div class="container">
      @if (session('successMsg'))
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Well done!</strong> {{ session('successMsg') }}
        </div>
    @endif
   <h2>View Bus Counters</h2>    
   
   <form method="get" action="{{ route('searchCounter') }}">
		@csrf

		 <input type="text" name="search" id="search" placeholder="Search by counter name" > <br>
        
<br>
		<input type="submit" name="submit" value="Submit" >
	</form>


    <table class="table table-bordered table-striped table-hover ">
  <thead>
  <tr>
    <th>Operator</th>
    <th>Manager</th>
    <th>Counter Name</th>
    <th>Location</th>
    
    <th class="text-center">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($counters as $counter)
   
  	<tr>
    	<td>{{ $counter->operator }}</td>
    	<td>{{ $counter->manager }}</td>
    	<td>{{ $counter->name }}</td>
    	<td>{{ $counter->location }}</td>
      

        <td class="text-center"><a class="btn btn-raised btn-primary btn-sm" href="{{ route('editcounter',$counter->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    
            <form method="POST" id="delete-form-{{ $counter->id }}" action="{{ route('deletecounter',$counter->id) }}" style="display: none;"> 
              {{ csrf_field() }}
              {{ method_field('delete') }}
              
            </form>
            <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $counter->id }}').submit();
            }else{
              event.preventDefault();
            }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>      
      
        </tr>
        
    @endforeach
  </tbody>
</table>
</div>
@endsection

