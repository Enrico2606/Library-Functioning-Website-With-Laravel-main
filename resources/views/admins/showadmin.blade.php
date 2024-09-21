@extends('admin')

@section('title', 'Show Admin')

@section('content')

<div class="container">
    <br><br><br>
    <div class="row justify-content-center">
        <h1 class="text-center">Admin Profile</h1>
        <div class="col-8">
            <br>
            <h4>Name : {{ $user->name}}</h4>
            <br />
            <h4>Email : {{ $user->email}}</h4>
            <br />
        </div>
    </div>
    
</div>

@endsection