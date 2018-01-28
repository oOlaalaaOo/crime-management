<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrimeCoordinate extends Model
{
    protected $table = 'crime_coordinates';

    protected $primaryKey = 'crime_coordinate_id';

    protected $fillable = [
    	'crime_coordinate_lat', 'crime_coordinate_long', 'case_detail_id'
    ];
}
