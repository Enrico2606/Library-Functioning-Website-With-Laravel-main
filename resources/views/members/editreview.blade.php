@extends('member')

@section('title', 'edit review')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Edit Review</h2>
                    </div>
                </div>
                
                @if($errors)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="/reviews/{{$data->id}}" method="post">
                    @method('PUT')
                    @csrf
                    Review:   <input class ="form-control" type="text" name="isi" value="{{$data->isi}}" /><br />
                    <button type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection