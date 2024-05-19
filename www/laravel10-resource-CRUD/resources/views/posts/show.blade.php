@extends('layouts.main')

@section('content')
        <h2>Add new post (файл show.blade.php с post id = {{$post->id}})</h2>

        <h2>{{$post['name']}}</h2>
        <article>{{$post['text']}}</article>

@endsection
