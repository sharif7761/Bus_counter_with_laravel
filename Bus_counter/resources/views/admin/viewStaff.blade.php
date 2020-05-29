@extends('layouts.app')

@section('content')
    <div class="container">
      @if (session('successMsg'))
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Well done!</strong> {{ session('successMsg') }}
        </div>
    @endif
   <h2>View Support Staffs</h2>     
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
    @foreach ($staffs as $staff)
   @if($staff->type=='staff' )
  	<tr>
    	<td>{{ $staff->id }}</td>
    	<td>{{ $staff->username }}</td>
    	<td>{{ $staff->type }}</td>
    	<td>{{ $staff->name }}</td>
      

        <td class="text-center"><a class="btn btn-raised btn-primary btn-sm" href="{{ route('editStaff',$staff->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    
            <form method="POST" id="delete-form-{{ $staff->id }}" action="{{ route('deletestaff',$staff->id) }}" style="display: none;"> 
              {{ csrf_field() }}
              {{ method_field('delete') }}
              
            </form>
            <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $staff->id }}').submit();
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

