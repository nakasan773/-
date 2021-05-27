<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false;

    // いいねしているかどうかの判定処理
    public function isFavorite(Int $user_id, Int $tweet_id)
    {
        return (boolean) $this->where('user_id', $user_id)->where('tweet_id', $tweet_id)->first();
    }
    
    //いいね一覧表示
    public function getFavorite(Int $tweet_id)
    {
        return $this->where('id', $tweet_id)->orderBy('id','desc')->paginate(50);
    }

    public function storeFavorite(Int $user_id, Int $tweet_id)
    {
        $this->user_id = $user_id;
        $this->tweet_id = $tweet_id;
        $this->save();

        return;
    }

    public function destroyFavorite(Int $favorite_id)
    {
        return $this->where('id', $favorite_id)->delete();
    }
}