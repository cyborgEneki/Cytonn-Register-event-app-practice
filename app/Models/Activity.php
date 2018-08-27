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
        return $this->belongsToMany( 'App\Event', 'activity_event',
            'activity_id', 'event_id' )->withPivot('status');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'activity_user',
            'activity_id', 'user_id');
    }

    public function getIsOwnedByCurrentUserAttribute()
    {

        return $this->users()->where("user_id",auth()->id())->get()->count()>0;
    }
}
