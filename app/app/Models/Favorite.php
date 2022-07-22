<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Favorite extends Model
{
    //usersテーブルとのリレーションを定義するuserメソッド
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //reviewsテーブルとのリレーションを定義するreviewメソッド
    public function Tweet()
    {   
        return $this->belongsTo(Tweet::class);
    }

    /**
     * いいね機能
     * 
     * @param  int  $loginUserId
     * @param  int  $tweetId
     * 
     * @return  void
     */
    public function favorite(string $loginUserId, int $tweetId) : void
    {   
        //ユーザーがこの投稿にいいねをしているか
        $alreadyFavorite = $this->where('user_id', $loginUserId)->where('tweet_id', $tweetId)->first();

        if (!$alreadyFavorite) { 
            $favorite = new Favorite; 
            $favorite->tweet_id = $tweetId; 
            $favorite->user_id = $loginUserId;
            $favorite->save();

        } else { 
            Favorite::where('tweet_id', $tweetId)->where('user_id', $loginUserId)->delete();
        }
    }
}
