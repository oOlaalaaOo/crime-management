<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime_category extends Model
{
    protected $table = 'crime_categories';
    protected $primaryKey = 'crime_category_id';
    protected $fillable = [
    	'name', 'crime_type_id'
    ];
}
