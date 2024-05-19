<div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
    @foreach ($categories1 as $category)
        <a href="{{ route('getPostsByCategoryName', $category->slug) }}"
            class="btn btn-outline-primary">{{ $category->title }}</a>
    @endforeach
</div>