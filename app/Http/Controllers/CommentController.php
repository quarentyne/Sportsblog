<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View {
        $comments = Comment::where('user_id', Auth::user()->id)->with('post')->orderBy('created_at', 'desc')->paginate(10);

        return view('comment.index',[
            'comments' => $comments,
        ]);
    }

    public function store(Request $request): JsonResponse {
        $request->validate([
            'body'      => ['required', 'min:2'],
            'post_id'   => ['required', 'min:1'],
        ]);

        $comment = Comment::create([
            'user_id'   => Auth::user()->id,
            'post_id'   => $request->post_id,
            'body'      => $request->body,
        ]);

        $comment->load(['user:id,avatar,first_name,last_name']);

        return response()->json($comment);
    }

    public function destroy(Comment $comment) {
        $comment->delete();

        return redirect()->route('comments');
    }
}
