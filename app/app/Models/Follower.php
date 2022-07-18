<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $primaryKey = [
        'following_user_id',
        'followed_user_id'
    ];
    protected $fillable = [
        'following_user_id',
        'followed_user_id'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function getFollowCount($user_id)
    {
        return $this->where('following_user_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_user_id', $user_id)->count();
    }

    /**
     * フォローしているユーザーのIDを取得
     * 
     * @access public
     * @param string $user_id
     * @return stirng followed_user_id
     */
    public function getFollowIds(string $user_id)
    {
        return $this->where('following_user_id', $user_id)->get('followed_user_id')->pluck('followed_user_id')->toArray();
    }
}
