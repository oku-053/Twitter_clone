<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

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
        $user = auth()->id();
        $commentData = $request->all();
        $comment->storeComment($user, $commentData);

        return back()->with('flash_message', 'Tweeting is complete!');
    }
}
