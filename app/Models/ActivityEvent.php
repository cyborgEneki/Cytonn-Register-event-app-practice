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
    protected $table='activity_event';

    protected $fillable = ['activity_id', 'event_id'];
}