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
        $all_users = $user->getAllUsers(auth()->user()->user_id);

        return view('users.index', [
            'all_users'  => $all_users
        ]);
    }

    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $login_user = auth()->user(); //ログインしている自分自身
        $timelines = $tweet->getUserTimeLine($user->user_id);
        $is_following = $login_user->isFollowing($user->user_id);
        $is_followed = $login_user->isFollowed($user->user_id);

        //カウント関連
        $tweet_count = $tweet->getTweetCount($user->user_id);
        $follow_count = $follower->getFollowCount($user->user_id);
        $follower_count = $follower->getFollowerCount($user->user_id);

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

    // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user->user_id);
        if (!$is_following) {
            $follower->follow($user->user_id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user->user_id);
        if ($is_following) {
            $follower->unfollow($user->user_id);
            return back();
        }
    }
}
