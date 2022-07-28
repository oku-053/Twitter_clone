<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request,Comment $comment)
    {
        $user = auth()->user();
        $data = $request->all();
        $comment->commentStore($user->user_id, $data);

        return back()->with('flash_message', 'Tweeting is complete!');
    }
}
