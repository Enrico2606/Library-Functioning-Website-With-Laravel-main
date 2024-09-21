@extends('admin')

@section('title', 'Review')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Reviews</h2>
                    </div>

                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Reviews</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <th scope="row"></th>
                            <th>
                                {{$data->isi}} <br />
                                Book Title : {{$data->buku->judul}} <br />
                                Member : {{$data->user->name}}
                            </th>
                            <td>
                                <a href="/reviews/delete/{{$data->id}}">DELETE</a>
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