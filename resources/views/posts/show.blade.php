@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card my-3" >
        <div class="card-body">
            <p>Post by <b style="color:blue;">{{$post->user->name}}</b></p>
            <h2>{{ $post->title }}</h2>
            <p style="color: Blue;">{{ $post->body }}</p>
        </div>
    </div>

    <h3>Comments</h3>

 {{--    @foreach($post->comments as $comment)
        <div class="card my-2">
            <div class="card-body">
                <p>{{ $comment->body }}</p>
            </div>
        </div>
    @endforeach --}}
    @foreach($comments as $comment)
    <div class="card my-2">
            <div class="card-body">
    <li>
        <strong>{{ $comment->user->name }}</strong>: {{ $comment->body }}
        <br>
        <small>Posted on {{ $comment->created_at->format('d-m-Y H:i') }}</small>
    </li>
     </div>
        </div>
    @endforeach

    <h4>Add a Comment</h4>
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}"> 
        <div class="form-group">
            <textarea name="body" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Submit</button>
    </form>
</div>
@endsection
