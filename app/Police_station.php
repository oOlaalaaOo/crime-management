<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Police_station extends Model
{
    protected $table = 'police_stations';
    protected $primaryKey = 'police_station_id';
    protected $fillable = [
    	'station', 'description'
    ];
}
