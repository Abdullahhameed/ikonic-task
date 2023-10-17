<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user')->get();

        return view('backend.comments.index', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        if(!$comment) return Redirect::route('admin.comments')->with('error', 'Opps Something went wrong!!');
        
        $comment->delete();
        return Redirect::route('admin.comments')->with('success', 'Data Deleted Successfully');
    }

    public function toggleComment(Request $request)
    {
        $comment= Comment::find($request->comment_id); 
        $comment->status = $comment->status === 1 ? 0 : 1;
        $comment->save();

        return true;
    }
}
