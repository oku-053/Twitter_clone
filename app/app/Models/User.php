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
    public function getAllUsers(string $user_id)
    {
        return $this->Where('user_id', '<>', $user_id)->paginate(5);
    }

    //フォロワー
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_user_id', 'following_user_id');
    }

  
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_user_id', 'followed_user_id');

    }

    //フォロー
    public function follow(string $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(string $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか判定
    public function isFollowing(string $user_id) 
    {
        return (boolean) $this->follows()->where('followed_user_id',$user_id)->first(['user_id']);
    }

    // フォローされているか判定
    public function isFollowed(string $user_id) 
    {
        return (boolean) $this->followers()->where('following_user_id', $user_id)->first(['user_id']);
    }    

    // 主キーカラム名を指定
    protected $primaryKey = 'user_id';
    // オートインクリメント無効化
    public $incrementing = false;
    // 主キーの型指名
    protected $keyType = 'string';

}
