@extends('layouts.main-layout')

@section('title', $post1->title ?? 'My Post')

@section('content')
    {{-- @include('includes.categories')  --}}

    {{-- 4из4 Выделение пункта меню активной Категории --}}
    @include('includes.categories', ['current_category1' => $current_category1])
    <div>
        <a href="{{ route('getPostsByCategoryName', $slug_category1) }}" class="btn btn-outline-primary mb-4">Back</a>
    </div>
    <article>
        <article>
            {!! $post1->text !!}
        </article>
    </article>
    <a href="javascript:history.back()" class="btn btn-outline-danger">Назад</a>
@endsection
