<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_assignment extends Model
{
    protected $table = 'user_assignments';
    protected $primaryKey = 'user_assignment_id';
    protected $fillable = [
    	'user_id', 'police_station_id', 'from', 'to'
    ];
}
