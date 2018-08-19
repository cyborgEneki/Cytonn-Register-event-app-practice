<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function teams()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
