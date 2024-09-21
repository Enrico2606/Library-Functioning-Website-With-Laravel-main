@extends('admin')

@section('title', 'Show Member')

@section('content')

<div class="container">
    <br><br><br>
    <div class="row justify-content-center">
        <h1 class="text-center">Member Profile</h1>
        <div class="col-8">
            <br>
            <h4>Name : {{ $user->name}}</h4>
            <br />
            <h4>Email : {{ $user->email}}</h4>
            <br />
            <h5>Reviewed Books :</h5>
            <ul class="list-group list-group-flush col-6">
                @foreach($review as $rev)
                @if($rev->user_id === $user->id)
                <li class="list-group-item"><a href="/showbuku/{{$rev->buku->id}}" style="color: black;">{{$rev->buku->judul}}<a></li>
                @endif
                @endforeach
                
            </ul>
        </div>
    </div>
    
</div>

@endsection