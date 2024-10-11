@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Posts</h1>

    @foreach($posts as $post)
        <div class="card my-3">
            <div class="card-body">
                <p>Post by <b style="color:blue;">{{$post->user->name}}</b></p>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->body }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View Post</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
