<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $primaryKey = [
        'following_userID',
        'followed_userID'
    ];
    protected $fillable = [
        'following_userID',
        'followed_userID'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
}
