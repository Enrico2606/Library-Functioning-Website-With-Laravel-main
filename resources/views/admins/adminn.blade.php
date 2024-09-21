@extends('admin')

@section('title', 'admin')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Admins</h2>
                    </div>
                    <div class="col-2">
                    <a type="button" class="btn btn-dark" role="button" href="/admins/create">New Admin</a>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        @if($data->role_id === 1)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>
                                <a href="/admins/{{$data->id}}">SHOW</a> |
                                <a href="/admins/delete/{{$data->id}}">DELETE</a> |
                                <a href="/admins/{{$data->id}}/edit">EDIT</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection