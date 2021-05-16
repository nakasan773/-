<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'user_sexes_id',
        'age',
        'residence',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // Sexモデルを親に持つことを明記
    public function sex()
    {
        return $this->belongsTo('App\Sex');
    }
    
    // リレーション
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }
    
    // リレーション
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }
}
