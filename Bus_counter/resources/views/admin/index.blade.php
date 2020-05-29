@extends('layouts.app')

@section('content')
<div class="container">
    
    
</div>

    <h1>Welcome Admin Home</h1>
    <h3>Name:
    @if(Session::has('uname'))
    {{ Session::get('uname') }}

    </h3>
@endif
@endsection