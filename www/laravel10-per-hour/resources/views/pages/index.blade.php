@extends('layouts.main-layout')

@section('title', $current_category1->title ?? 'Test Blog')

@section('content')
    @include('includes.categories')
    @foreach ($posts1 as $post)
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('getPostsByCategoryName', $post->category['slug']) }}">{{ $post->category['title'] }}</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->description }}</p>
                <a href="{{route('getPostName',[$post->category['slug'], $post->slug])}}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $posts1->links('vendor.pagination.bootstrap-4') }} <!-- Отображаем ссылки пагинации -->
    </div>
    <a href="javascript:history.back()" class="btn btn-outline-danger">Назад</a>
@endsection
