<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime_category extends Model
{
    protected $table = 'crime_categories';
    protected $primaryKey = 'crime_category_id';
    protected $fillable = [
    	'crime_category_name', 'crime_type_id'
    ];

    public function offenses()
    {
    	return $this->hasMany('App\Offense', 'crime_category_id');
    }

    public function crime_type()
    {
    	return $this->belongsTo('App\Crime_type', 'crime_type_id');
    }
}
