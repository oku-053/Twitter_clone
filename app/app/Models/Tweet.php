<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Tweet extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    /**
     * User::classのデータへリレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Favorite::classのデータへリレーション
     * 1つの投稿に対して、Favoriteのデータ取得
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * 	Comment::classのデータへリレーション
     * 1つの投稿に対して、Commentのデータ取得
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * $user_idとTweetテーブル'user_id'が一致する投稿を新着順で1ページ50件ずつ表示
     * 
     * @param string $user_id
     */
    public function getUserTimeLine(string $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(config('const.paginate.tweet'));
    }

    /**
     * $user_idとTweetテーブル'user_id'が一致する投稿数をカウント
     * 
     * @param string $user_id
     * 
     * @return Int
     */
    public function getTweetCount($user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
}
