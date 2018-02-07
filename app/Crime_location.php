<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime_location extends Model
{
    protected $table = 'crime_locations';
    protected $primaryKey = 'crime_location_id';
    protected $fillable = [
    	'region_id', 'city_id', 'province_id', 'home_address'
    ];
}
