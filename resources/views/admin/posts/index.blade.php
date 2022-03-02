@extends('layouts.admin')
@section('documentTitle')
    Tutti i post
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    Posts
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add new post</a>
            </div>
        </div>
        <div class="row w-100">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th colspan="3" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td class="text-capitalize">{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">View</a>
                            </td>
                            <td>
                                @if (Auth::user()->id === $post->user_id)
                                    <a class="btn btn-info"
                                        href="{{ route('admin.posts.edit', $post->slug) }}">Modify</a>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->id === $post->user_id)
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection