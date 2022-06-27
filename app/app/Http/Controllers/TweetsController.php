<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\User;
use App\Models\Tweet;
use App\models\Follower;

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
        $followIds = $follower->followingIds($loginUser->user_id);
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
        $user = auth()->user();

        return view('tweets.create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tweet $tweet)
    {
        $user = auth()->user();
        $requestData = $request->all();
        $validator = Validator::make($requestData, [
            'text' => ['required', 'string', 'max:140']
        ]);

        $validator->validate();
        $tweet->tweetStore($user->user_id, $requestData);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
