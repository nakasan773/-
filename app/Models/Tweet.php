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
        'text'
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
}
