<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Tweet;

class FavoritesController extends Controller
{
    /**
     * いいね
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function favorite(Request $request ,Favorite $favorite)
    {
        $userId = auth()->user()->user_id; 
        $tweetId = $request->tweetId;
        $favorite->favorite($userId,$tweetId);
        $favoriteCountJson = $favorite->favoritesCountJson($tweetId);
        return response()->json($favoriteCountJson); 
    }
}
