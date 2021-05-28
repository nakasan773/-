<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
          'tweet_id','user_id'
    ];
    
    public function user()
   {
       return $this->belongsTo('App\Models\User');
   }
   
   public function tweet()
   {
       return $this->belongsTo('App\Models\Tweet');
   }
}
