<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    use SoftDeletes;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'image'
    ];
    
    //Userモデルを親に持つことを明記
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Followerモデルを子に持つことを明記
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    //Commentモデルを子に持つことを明記
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    //ページネーション（カウント）ユーザー数
    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    //ページネーション（カウント）ツイート
    public function getTweetCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
    
    // 詳細画面
    public function getTweet(Int $tweet_id)
    {
        return $this->with('user')->where('id', $tweet_id)->first();
    }
    
    // 一覧画面
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }


    public function tweetStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->text = $data['text'];
        
        
        //$file = $data->file('image');
        //$file_name = $file->getClientOriginalName();
        
        //$this->image = $filename;
        
        //$file_name = $data['image'];
        //$file_name->store('public/images', $file_name);
        
        //$this->image = $data['image'];
        
        
        $this->save();

        return;
    }

    public function getEditTweet(Int $user_id, Int $tweet_id)
    {
        return $this->where('user_id', $user_id)->where('id', $tweet_id)->first();
    }
    
    public function tweetUpdate(Int $tweet_id, Array $data)
    {
        $this->id = $tweet_id;
        $this->text = $data['text'];
        $this->update();

        return;
    }

    public function tweetDestroy(Int $user_id, Int $tweet_id)
    {
        return $this->where('user_id', $user_id)->where('id', $tweet_id)->delete();
    }
}
