<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    public function events () {
        return $this->belongsToMany( 'App\Event', 'activity_event', 'activity_id', 'event_id' );
    }
}
