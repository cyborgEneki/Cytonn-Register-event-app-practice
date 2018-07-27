<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $events = 'events';
    protected $fillable = ['name', 'frequency', 'start_date', 'start_time', 'lead_start_date', 'location'];

    public function activities()
    {
        return $this->belongsToMany( 'App\Activity', 'activity_event', 'event_id', 'activity_id' );
    }

}
