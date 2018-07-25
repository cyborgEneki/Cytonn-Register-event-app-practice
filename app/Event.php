<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $events = 'events';
    protected $fillable = ['name', 'frequency', 'start_date_and_time', 'lead_start_date', 'lead_duration'];

    public function activities()
    {
        return $this->belongsToMany( 'App\Activity', 'activity_event', 'event_id', 'activity_id' );
    }

}
