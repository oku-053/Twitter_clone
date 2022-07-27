<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Models\Follower;
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
        $loginUserId = auth()->user()->user_id;
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
        $requestText = $request->input('text');
        $user = auth()->user();
        $tweet->tweetStore($user->user_id, $requestText);

        return back()->with('flash_message', 'Tweeting is complete!');
    }

    /**
     * Display the specified resource.
     *
     * @param Tweet $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        $user = auth()->user();
        $targetTweet = $tweet->getTweet($tweet->tweet_id);

        return view('tweets.show', [
            'user'     => $user,
            'tweet' => $targetTweet
        ]);
    }
}
