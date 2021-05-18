<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    
    //Userモデルを親に持つことを明記
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
                                                            //--ここからTweetsController（show）--
    //詳細画面
    public function getComments(Int $tweet_id)
    {
        return $this->with('user')->where('tweet_id', $tweet_id)->get();
    }
    
                                                            //--ここからCommentController（store）--
    //リターンバック
    public function commentStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->tweet_id = $data['tweet_id'];
        $this->text = $data['text'];
        $this->save();

        return;
    }
    
}
