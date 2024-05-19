<div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
    @foreach ($categories1 as $category)
    {{-- <a href="{{ route('getPostsByCategoryName', $category->slug) }}" class="btn btn-outline-primary">{{ $category->title }}</a> --}}

        {{-- 1из4 Выделение пункта меню активной Категории --}}
        <a href="{{ route('getPostsByCategoryName', $category->slug) }}"
            class="btn btn-outline-primary {{ isset($current_category1) && $current_category1->slug == $category->slug ? 'active' : '' }}">{{ $category->title }}</a>
    @endforeach
</div>
