<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Follower;
use App\Models\Tweet;
use App\Models\User;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

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
        $loginUser = auth()->user();
        $followIds = $follower->getFollowIds($loginUser->user_id);
        $timelines = $tweet->getTimelines($loginUser->user_id, $followIds);
        return view('tweets.index', [
            'loginUser'      => $loginUser,
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
        $tweet = $tweet->getTweet($tweet->tweet_id);

        return view('tweets.show', [
            'user'     => $user,
            'tweet' => $tweet
        ]);
    }
}
