@extends('layouts.admin')
@section('documentTitle')
    {{ $post->title }}
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-capitalize">{{ $post->title }}</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div>{{ $post->content }}</div>
                <div class="mt-3"><span>Author: {{  $post->user()->first()->name }}</span></div>
                <div><span>Category: {{  $post->category()->first()->name }}</span></div>
                <div><span>Tags: 
                @foreach ($post->tags()->get() as $tag)
                    {{ $tag->name }}
                @endforeach</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary mt-3" href="{{ route('admin.posts.index') }}">Go Back</a>
            </div>
        </div>
    </div>
@endsection