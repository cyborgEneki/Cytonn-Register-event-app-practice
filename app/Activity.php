<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $table='activities';

    protected $guarded=[];

    public function events ()
    {
        return $this->belongsToMany( 'App\Event', 'activity_event', 'activity_id', 'event_id' );
    }
}
