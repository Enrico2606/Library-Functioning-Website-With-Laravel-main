@extends('member')

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
    @foreach($data->reviews as $review)
    @if(Auth::user()->id !== $review->user_id)
    <div class="row">
        <div class="col-2">
            {{$review->user->name}}
        </div>
        <div class="col-10">
            {{$review->isi}}
        </div>
        <br><br>
    </div>
    @else
    <div class="row">
        <div class="col-2">
            {{$review->user->name}}
        </div>
        <div class="col-10">
            {{$review->isi}}
        </div>
        <br>
    </div>
    
    <div class="row">
        <div class="col-2">.</div>
        <div class="col-10">
        <a href="/reviews/{{$review->id}}/edit">EDIT REVIEW</a>
        <a href="/reviews/delete/{{$review->id}}">DELETE</a>
        </div>
        <br><br>
    </div>
    
    @endif
    @endforeach
    <div class="row">
        <div class="col-2">.</div>
        <div class="col-10">
        @if($count === 0)
            <br /><br />
            <form action="/reviews" method="post">
                @csrf
                Review:   <input class ="form-control" type="text" name="isi" /><br />
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                <input type="hidden" name="buku_id" value="{{$data->id}}"/>
                <button type="submit">Submit</button>
            </form>
        @endif
        </div>
    </div>
</div>
@endsection