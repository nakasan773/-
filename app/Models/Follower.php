<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $primaryKey = [
        'following_id',
        'followed_id'
    ];
    protected $fillable = [
        'following_id',
        'followed_id'
    ];
    public $timestamps = false;
    public $incrementing = false;
    
    //ページネーション（カウント）フォロー数
    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    //ページネーション（カウント）フォロワー数
    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
    
                                                                //--ここからTweetsController（index）--
    // 詳細画面（フォローしているユーザのIDを取得）
    public function followingIds(Int $user_id)
    {
        return $this->where('following_id', $user_id)->get('followed_id');
    }
}
