<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Follower;
use App\Http\Requests\TweetRequest;
use App\Models\Tweet;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Tweet $tweet
     * @param Follower $follower
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tweet $tweet, Follower $follower)
    {
        $loginUserId = auth()->id();
        $followIds = $follower->getFollowIds($loginUserId);
        $timelines = $tweet->getTimelines($loginUserId, $followIds);
        return view('tweets.index', [
            'timelines' => $timelines,
            'followIds' => $followIds,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets.create', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\TweetRequest  $request
     * @param Tweet $tweet
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request, Tweet $tweet)
    {
        $loginUserId = auth()->id();
        $requestText = $request->input('text');
        $tweet->storeTweet($loginUserId, $requestText);

        return back()->with('flash_message', 'Tweeting is complete!');
    }

    /**
     * Display the specified resource.
     *
     * @param Tweet $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet, Comment $comment)
    {
        $user = auth()->user();
        $targetTweet = $tweet->getTweet($tweet->tweet_id);
        $comments = $comment->getComments($tweet->tweet_id);
        return view('tweets.show', [
            'user'     => $user,
            'tweet' => $targetTweet,
            'comments' => $comments
        ]);
    }
}
