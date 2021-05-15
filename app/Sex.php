<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $table = 'user_sexes';
    
    protected $fillable = [
        'sex'
    ];
    
    // Userモデルを子に持つことを記述
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
