@extends('admin')

@section('title', 'categories')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Category</h2>
                    </div>
                    <div class="col-2">
                    <a type="button" class="btn btn-dark" role="button" href="/categories/create">New Category</a>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <th scope="row"></th>
                            <th>{{$data->category}}</th>
                            <td>
                                <a href="/categories/{{$data->id}}/edit">EDIT</a> | 
                                <form action="/categories/{{$data->id}}" method="post">
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
</div>

@endsection