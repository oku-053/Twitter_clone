<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Tweet $tweet
     * @param Follower $follower
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tweet $tweet)
    {
        $timelines = $tweet->getAllTimelines();
        return view('top', [
            'timelines' => $timelines,
        ]);
    }
}
