<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\models\Follower;
use App\models\Tweet;
use App\models\User;

class UsersController extends Controller
{
    /**
     * ユーザーIDを全て取得し、viweに返す
     * 
     * @access public
     * @param User $user
     * @see getAllUsers
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->user_id);

        return view('users.index', [
            'all_users'  => $all_users
        ]);
    }

    /**
     * 特定のユーザーに関する情報を取得し、viewに返す
     * 
     * @access public
     * @param User $user
     * @param Tweet $tweet
     * @param Follower $follower
     *  
     * @see getUserTimeLine, isFollowing, isFollowed, getTweetCount, getFollowCoun, getFollowerCount
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $loginUser = auth()->user(); //ログインしている自分自身
        $timelines = $tweet->getUserTimeLine($user->user_id);
        $isFollowing = $loginUser->isFollowing($user->user_id);
        $isFollowed = $loginUser->isFollowed($user->user_id);

        //カウント関連
        $tweetCount = $tweet->getTweetCount($user->user_id);
        $followCount = $follower->getFollowCount($user->user_id);
        $followerCount = $follower->getFollowerCount($user->user_id);

        return view('users.show', [
            'user'           => $user,
            'isFollowing'   => $isFollowing,
            'isFollowed'    => $isFollowed,
            'timelines'      => $timelines,
            'tweetCount'    => $tweetCount,
            'followCount'   => $followCount,
            'followerCount' => $followerCount
        ]);
    }

    /**
     * ユーザーのフォロー
     * 
     * @access public
     * @param User $user
     * @see sFollowing, follow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow(User $user)
    {
        $follower = auth()->user();
        $isFollowing = $follower->isFollowing($user->user_id);
        if (!$isFollowing) {
            $follower->follow($user->user_id);
        }
        return back();
    }

    /**
     * ユーザーのフォロー解除
     * 
     * @access public
     * @param User $user
     * @see sFollowing, unfollow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $isFollowing = $follower->isFollowing($user->user_id);
        if ($isFollowing) {
            $follower->unfollow($user->user_id);
        }
        return back();
    }

    /**
     * 入力された内容を$userに入れて返す
     * 
     * @access public
     * @param User $user
     *  
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * ユーザー情報更新時の内容にバリデーションをかける
     * 
     * @access public
     * @param User $user
     * @param Request $request
     *  
     * @see updateProfile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'profile_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->user_id, 'user_id')]
        ]);
        $user->updateProfile($data);

        return redirect(route('users.show', $user->user_id));
    }
}
