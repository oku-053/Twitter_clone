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

    public function getComments(Int $tweetId)
    {
        return $this->where('tweet_id', $tweetId)->with('user')->orderBy('created_at', 'DESC')->get();
    }

    public function commentStore(string $userId, Array $data)
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
    public function isFavoritedBy($user): bool {
        return Favorite::where('user_id', $user->user_id)->where('tweet_id', $this->tweet_id)->first() !==null;
    }

    /**
     * いいね数カウント
     * 
     * @return int $tweetFavoritesCount
     */
    public function favoritesCount()
    {
        $tweetFavoritesCount = Favorite::where('tweet_id',$this->tweet_id)->count();
        $param = [
        'review_likes_count' => $tweetFavoritesCount,
        ];
        if($tweetFavoritesCount !== null){
            return $tweetFavoritesCount;
        }
        else{
            return 0;
        }
    }

        // 主キーカラム名を指定
        protected $primaryKey = 'comment_id';
        // オートインクリメント無効化
        public $incrementing = false;
        // 主キーの型指名
        protected $keyType = 'Int';
}