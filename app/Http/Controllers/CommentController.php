<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index () {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $comments = Comment::orderBy('created_at', 'asc')->paginate(10);
        return view('partials.comment', compact('comments'));
    }

    public function destroy (Comment $comment) {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $comment->delete();
        return redirect()->route('comment.index');
    }
    public function store(Request $request, Game $game) {
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->game_id = $game->id;
        $comment->message = $request->message;
        $comment->user_name = Auth::user()->name;
        $comment->save();

        return redirect()->route('games.show', $game->id);
    }
}
