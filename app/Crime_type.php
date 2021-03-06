<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime_type extends Model
{
    protected $table = 'crime_types';
    protected $primaryKey = 'crime_type_id';
    protected $fillable = [
    	'crime_type_name'
    ];

    public function crime_categories()
    {
    	return $this->hasMany('App\Crime_category', 'crime_type_id');
    }
}
