<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\models\User;
use App\models\Tweet;
use App\models\Follower;

class UsersController extends Controller
{
    //ユーザ一覧表示
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->userID);

        return view('users.index', [
            'all_users'  => $all_users
        ]);
    }

    // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->userID);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->userID);
            return back();
        }
    }
 
     // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->userID);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->userID);
            return back();
        }
    } 
    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->userID);
        $is_followed = $login_user->isFollowed($user->userID);
        $timelines = $tweet->getUserTimeLine($user->userID);
        $tweet_count = $tweet->getTweetCount($user->userID);
        $follow_count = $follower->getFollowCount($user->userID);
        $follower_count = $follower->getFollowerCount($user->userID);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }  
}
