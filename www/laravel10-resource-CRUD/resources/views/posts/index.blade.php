@extends('layouts.main')

@section('content')
    <h2>Posts (файл index.blade.php)</h2>
    <a href="{{ route('posts.create') }}">Add post (переход на create.blade.php)</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->name }}</a></td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <!-- Добавляем отступ -->
                        <span style="margin-right: 10px;"></span>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
