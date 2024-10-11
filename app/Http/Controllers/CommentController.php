<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index(Request $request)
    // {
    //     // Make sure you are querying the right models
    //     $postId = $request->query('1'); // Assuming '1' is a query parameter for the post ID
    //     $post = Post::find($postId); // Querying the Post model
    //     if ($post) {
    //         $comments = $post->comments; // Assuming the relationship is defined in Post
    //         return view('comments.index', compact('comments'));
    //     }
    //     return response('Post not found', 404);
    // }

    public function index($postId)
    {
        $post = Post::findOrFail($postId);
        $comments = $post->comments; // Assuming relationship is set in Post model
        return view('posts.comments.index', compact('comments', 'post'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id, // or any author name
        ]);

        return redirect()->back();
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return response()->json(null, 204);
    }
}