@extends('guest')

@section('title', 'guest')

@section('content')
<br>
<div class="row">
    <div class="col-4" style="color:white;">.</div>
    <div class="col-4 text-center">
    <form action="/search" method="get">
    <div class="input-group">
        <input type="text" class="form-control" name="search"
            placeholder="Search"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
    </form>
    </div>
    <div class="col-4" style="color:white;">.</div>
</div>
<br>
<div class="row">
<ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">All</a>
  </li>
    @foreach($cate as $cat)
  <li class="nav-item">
    <a class="nav-link" href="/home/{{$cat->id}}">{{$cat->category}}</a>
  </li>
  @endforeach
</ul>
</div>
<br>
<div class="row">
    @if($count !== 0)
    @foreach($bukus as $buku)
  
    <div class="col-3 text-center">
        <a href="/showbuku/{{$buku->id}}"><img src="{{ asset('images/' . $buku->foto) }}" style="widht: 200px; height: 200px; padding: 3%;"/></a>
        <br>
        <h5>{{$buku->judul}}</h5>
        <h5>{{$buku->cate->category}}</h5>
        <h5>{{$buku->author}}</h5>
        <br><br>
    </div>
    
    @endforeach
    @else
    <h3 class="text-center">Data Not Found!</h3>
    @endif
</div>

<div class="row text-center">
{{ $bukus->links() }}
</div>

@endsection