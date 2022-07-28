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
        $commentData = $request->all();
        $comment->storeComment($user->user_id, $commentData);

        return back()->with('flash_message', 'Tweeting is complete!');
    }
}
