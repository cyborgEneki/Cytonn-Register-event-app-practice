<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $table = 'activities';

    protected $guarded = [];

    public function events()
    {
        return $this->belongsToMany('App\Event', 'activity_event',
            'activity_id', 'event_id')->withPivot('status');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'activity_user',
            'activity_id', 'user_id');
    }

    public function getIsOwnedByCurrentUserAttribute()
    {
        return $this->users()->where("user_id", auth()->id())->get()->count() > 0;
    }

    public function getStatus(Event $event)
    {

        if ($event->start_date > Carbon::now()) {

            if (Carbon::now() > $event->lead_start_date) {
                if (Carbon::now() < $event->lead_end_date) {
                    return "<i class=\"fas fa-circle fa-on-time\"></i>&nbsp;On time";
                }
            }

            if (Carbon::now() < $event->lead_start_date) {
                if (Carbon::now() > $event->lead_end_date) {
                    return "<i class=\"fas fa-circle fa-late\"></i>&nbsp;Late";
                }
            }
        } else {

            return "<i class=\"fas fa-circle fa-happening\"></i>&nbsp;Not happening";
//            return "<div class='callout alert'> <p>Not happening</p></div>";
        }
    }
}
