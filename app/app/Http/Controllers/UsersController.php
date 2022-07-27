<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
        $loginDecision = $user->loginDecision($user->user_id);
        $timelines = $tweet->getUserTimeLine($user->user_id);
        $isFollowing = $loginUser->isFollowing($user->user_id);
        $isFollowed = $loginUser->isFollowed($user->user_id);

        //カウント関連
        $tweetCount = $tweet->getTweetCount($user->user_id);
        $followCount = $follower->getFollowCount($user->user_id);
        $followerCount = $follower->getFollowerCount($user->user_id);

        return view('users.show', [
            'user'           => $user,
            'loginDecision' => $loginDecision,
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
        $this->authorize('update', $user);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * ユーザー情報更新
     * 
     * @access public
     * @param User $user
     * @param UserRequest $request
     *  
     * @see updateProfile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->all();
        $user->updateProfile($data);

        return redirect(route('users.show', $user->user_id));
    }
}
