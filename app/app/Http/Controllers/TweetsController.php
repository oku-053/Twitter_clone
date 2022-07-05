<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Follower;

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
        $followIds = $follower->getFollowingIds($loginUser->user_id);
        $followingIds = $followIds->pluck('followed_user_id')->toArray();
        $timelines = $tweet->getTimelines($loginUser->user_id, $followingIds);
        return view('tweets.index', [
            'user'      => $loginUser,
            'timelines' => $timelines,
            'followingIds' => $followingIds,
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
     * @param  \Illuminate\Http\Request  $request
     * @param Tweet $tweet
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tweet $tweet)
    {
        $requestText = $request->input('text');
        $request->validate([
            'text' => ['required', 'string', 'max:140']
        ]);
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
