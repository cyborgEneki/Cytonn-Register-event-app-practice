<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 14/08/2018
 * Time: 3:30 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityEvent extends Model
{
    protected $table = 'activity_event';

    public function event () {
        return $this->belongsTo( Event::class );
    }

    public function activity () {
        return $this->belongsTo( Activity::class );
    }
}