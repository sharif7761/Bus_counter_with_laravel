@extends('layouts.home')

@section('content')
    <div class="container">
      @if (session('successMsg'))
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Well done!</strong> {{ session('successMsg') }}
        </div>
    @endif
   <h2>View Bus buses</h2>      

   
   <form method="get" action="{{ route('home.search') }}">
		@csrf

		 <input type="text" name="search" id="search" placeholder="Search by bus name" > <br>
        
<br>
		<input type="submit" name="submit" value="Submit" >
	</form>


    <table id="datatable" class="table table-bordered table-striped table-hover ">
  <thead>
  <tr>
    <th>Bus Name</th>
    <th>location</th>
    <th>seat_row </th>
    <th>seat_column</th>
    <th>company</th>

    <th class="text-center">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($buses as $bus)
   
  	<tr>
    	<td>{{ $bus->name }}</td>
    	<td>{{ $bus->location }}</td>
    	<td>{{ $bus->seat_row }}</td>
      <td>{{ $bus->seat_column }}</td>
      <td>{{ $bus->company }}</td>
      

        <td class="text-center"><a class="btn btn-raised btn-primary btn-sm" href="{{ route('home.editbus',$bus->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
    
            <form method="POST" id="delete-form-{{ $bus->id }}" action="{{ route('deletebus',$bus->id) }}" style="display: none;"> 
              {{ csrf_field() }}
              {{ method_field('delete') }}
              
            </form>
            <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $bus->id }}').submit();
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

</body>
</html>


@section('scripts')
<script>
  $(document).ready(function(){
    $('#datatable').DataTable();
  });
  </script>
    
@endsection