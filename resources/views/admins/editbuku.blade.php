@extends('admin')

@section('title', 'edit books')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Edit Books</h2>
                    </div>
                </div>
                
                @if($errors)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="/bukus/{{$data->id}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    Judul:   <input class ="form-control" type="text" name="judul" value="{{$data->judul}}" /><br />
                    Author:   <input class ="form-control" type="text" name="author" value="{{$data->author}}"/><br />
                    Isi: <input class ="form-control" type="text" name="isi" value="{{$data->isi}}"/><br />
                    Category: <select class="form-select" name="category_id" aria-label="Default select example">
                                @foreach($cates as $cate)
                                <option value="{{$cate->id}}">{{$cate->category}}</option>
                                @endforeach
                              </select>
                    <br />
                    Cover: <input type="file" name="foto" /><br />
                    <br />
                    <button type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection