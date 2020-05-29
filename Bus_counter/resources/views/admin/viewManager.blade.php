@extends('layouts.app')

@section('content')
    <div class="container">
      @if (session('successMsg'))
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Well done!</strong> {{ session('successMsg') }}
        </div>
    @endif
   <h2>View Managers</h2>     
    <table class="table table-bordered table-striped table-hover ">
  <thead>
  <tr>
    <th>ID</th>
    <th>User Name</th>
    <th>Type</th>
    <th>Name</th>
    
    <th class="text-center">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($managers as $manager)
   @if($manager->type=='manager' )
  	<tr>
    	<td>{{ $manager->id }}</td>
    	<td>{{ $manager->username }}</td>
    	<td>{{ $manager->type }}</td>
    	<td>{{ $manager->name }}</td>
      

        <td > 
            <form method="POST" id="delete-form-{{ $manager->id }}" action="{{ route('deleteManager',$manager->id) }}" style="display: none;"> 
              {{ csrf_field() }}
              {{ method_field('delete') }}
              
            </form>
            <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $manager->id }}').submit();
            }else{
              event.preventDefault();
            }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>      
      
        </tr>
        @endif
    @endforeach
  </tbody>
</table>
</div>
@endsection

