@extends('guest')

@section('title', 'Show Book')

@section('content')
<div class="container">
    <br><br><br>
    <div class="row justify-content-center">
        <div class="col-4">
        <img src="{{ asset('images/' . $data->foto) }}" style="widht: 280px; height: 280px; padding: 3%;"/>
        </div>
        <div class="col-8">
            <h1>{{$data->judul}}</h1>
            <br />
            <h4>{{$data->author}}</h4>
            <br />
            <h4>{{$data->cate->category}}</h4>
            <br />
            <h6>{{$data->isi}}</h6>
        </div>
    </div>
    <br />
    <h2>Reviews</h2>
    <div class="row">
        @foreach($data->reviews as $review)
        <div class="col-2">
            {{$review->user->name}}
        </div>
        <div class="col-10">
            
            {{$review->isi}}
        
        </div>
        <br><br>
        @endforeach
    </div>
    <div class="row">
        <div class="col-2">.</div>
        <div class="col-10">
            <br /><br />
            <a href="/login">Login to Write Review</a>
        </div>
    </div>
</div>
@endsection