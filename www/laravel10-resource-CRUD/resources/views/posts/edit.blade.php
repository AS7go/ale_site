@extends('layouts.main')

@section('content')
    <h2>Edit post (файл edit.blade.php)</h2>
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" value="{{$post['name']}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="Post title">
        </div>
        <div class="form-group">
            <textarea name="text" id="" cols="30" rows="10">{{$post['text']}}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Save</button>
    </form>
@endsection
