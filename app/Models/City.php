<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
        // Tweetモデルを子に持つことを記述
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
}
