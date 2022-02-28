@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <h1 class="h1">Admin - All Posts</h1>
        </div>
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add new post</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-info">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-15">Title</th>
                            <th class="w-40">Content</th>
                            <th class="w-15">Slug</th>
                            <th class="w-20">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-capitalize">{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                <a class="btn btn-primary me-3" href="{{ route('admin.posts.show', $post->slug) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Cancella">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection