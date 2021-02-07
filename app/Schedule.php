<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'schedule_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_id', 'conductor_id', 'bus_id', 'track_id', 'schedule_start', 'schedule_end'
    ];
}
