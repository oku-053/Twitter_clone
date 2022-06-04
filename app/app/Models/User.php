<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'profile_image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //ユーザー一覧表示
    public function getAllUsers(string $userID)
    {
        return $this->Where('userID', '<>', $userID)->paginate(5);
    }

    //フォロワー
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_userID', 'following_userID');
    }

  
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_userID', 'followed_userID');

    }

    //フォロー
    public function follow(string $userID) 
    {
        return $this->follows()->attach($userID);
    }

    // フォロー解除する
    public function unfollow(string $userID)
    {
        return $this->follows()->detach($userID);
    }

    // フォローしているか判定
    public function isFollowing(string $userID) 
    {
        return (boolean) $this->follows()->where('followed_userID', $userID)->first(['followed_userID']);
    }

    // フォローされているか判定
    public function isFollowed(string $userID) 
    {
        return (boolean) $this->followers()->where('following_userID', $userID)->first(['following_userID']);
    }    

    // 主キーカラム名を指定
    protected $primaryKey = 'user_id';
    // オートインクリメント無効化
    public $incrementing = false;
    // 主キーの型指名
    protected $keyType = 'string';

}
