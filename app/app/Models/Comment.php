<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * コメントテーブルを取得する
     * @param int $tweetId
     * 
     * @return object
     */
    public function getComments(int $tweetId): object
    {
        return $this->where('tweet_id', $tweetId)->with('user')->orderBy('created_at', 'DESC')->get();
    }

    /**
     * コメントを保存する
     * @param string $userId
     * @param array $data
     * 
     * @return void
     */
    public function storeComment(string $userId, array $data): void
    {
        $this->user_id = $userId;
        $this->tweet_id = $data['tweet_id'];
        $this->text = $data['text'];
        $this->save();

        return;
    }

    /**
     * そのユーザーにいいねされているか
     * 
     * @param $user
     * @return bool
     */
    public function isFavoritedBy($user): bool
     {
        return Favorite::where('user_id', $user->user_id)->where('tweet_id', $this->tweet_id)->first() !==null;
    }

    /**
     * いいね数カウント
     * 
     * @return int $tweetFavoritesCount
     */
    public function favoritesCount(): int 
    {
        $tweetFavoritesCount = Favorite::where('tweet_id',$this->tweet_id)->count();

        return $tweetFavoritesCount !== null ? $tweetFavoritesCount : 0 ;
    }

        // 主キーカラム名を指定
        protected $primaryKey = 'comment_id';
        // オートインクリメント無効化
        public $incrementing = false;
        // 主キーの型指名
        protected $keyType = 'Int';
}