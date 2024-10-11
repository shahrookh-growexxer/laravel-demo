<!-- resources/views/comments/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to CSS if you have it -->
</head>
<body>
    <div class="container">
        <h1>Comments for Post</h1>

        @if($comments->isEmpty())
            <p>No comments available.</p>
        @else
            <ul>
                @foreach($comments as $comment)
                    <li>
                        <strong>{{ $comment->author }}</strong>: {{ $comment->body }}
                        <br>
                        <small>Posted on {{ $comment->created_at->format('d-m-Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Add new comment form -->
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Add a Comment:</label>
                <input type="textarea" name="body" id="body" class="form-control" rows="3" />
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    </div>
</body>
</html>
