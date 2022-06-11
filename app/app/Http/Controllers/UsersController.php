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

    // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->user_id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->user_id);
            return back();
        }
    }
 
     // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->user_id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->user_id);
            return back();
        }
    } 

}
