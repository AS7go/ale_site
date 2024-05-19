@extends('layouts.main')

@section('content')
        <h2>Add new post (файл create.blade.php)</h2>
        <form method="POST" action="{{route('posts.store')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="Post title">
            </div>
            <div class="form-group">
                <textarea name="text" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </form>
@endsection
