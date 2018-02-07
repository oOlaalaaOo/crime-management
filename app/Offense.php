<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offense extends Model
{
    protected $table = 'offenses';
    protected $primaryKey = 'offense_id';
    protected $fillable = [
    	'crime_category_id', 'offense_name', 'offense_description'
    ];
}
