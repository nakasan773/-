<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
}
