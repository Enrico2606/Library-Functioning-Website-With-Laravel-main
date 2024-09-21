@extends('admin')

@section('title', 'books')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Books</h2>
                    </div>
                    <div class="col-2">
                    <a type="button" class="btn btn-dark" role="button" href="/bukus/create">New Books</a>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Cover</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                    
                        <tr>
                            <th scope="row"></th>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->cate->category}}</td>
                            <td>{{$data->author}}</td>
                            <td>
                                <a href="/showbuku/{{$data->id}}">SHOW</a> |
                                <a href="/bukus/{{$data->id}}/edit">EDIT</a> | 
                                <form action="/bukus/{{$data->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="row text-center">
    {{ $datas->links() }}
    </div>
</div>

@endsection