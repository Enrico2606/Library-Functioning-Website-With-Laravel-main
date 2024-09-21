@extends('admin')

@section('title', 'member')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Members</h2>
                    </div>
                    <div class="col-2">
                    
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
                        @if($data->role_id === 2)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>
                                <a href="/members/{{$data->id}}">SHOW</a> |
                                <a href="/members/hapus/{{$data->id}}">BLOCK</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @foreach($blocks as $block)
                        @if($block->role_id === 2)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$block->name}}</td>
                            <td>{{$block->email}}</td>
                            <td>
                                <a href="/members/unblock/{{$block->id}}">UNBLOCK</a>
            
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