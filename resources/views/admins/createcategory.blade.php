@extends('admin')

@section('title', 'create category')

@section('content')

<br /> <br />
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2">.</div>
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h2>Create New Category</h2>
                    </div>
                </div>
                
                @if($errors)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="/categories" method="post">
                    @csrf
                    Category:   <input class ="form-control" type="text" name="category" /><br />
                
                    <button type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection