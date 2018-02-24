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

    public function crime_classifications()
    {
    	return $this->hasMany('App\Crime_classification', 'offense_id');
    }

    public function crime_category()
    {
    	return $this->belongsTo('App\Crime_category'. 'category_id');
    }
}
