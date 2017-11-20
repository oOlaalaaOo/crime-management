<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_detail extends Model
{
    protected $table = 'case_details';
    protected $primaryKey = 'case_detail_id';
    protected $fillable = [
    	'crime_detail_id', 'crime_location_id', 'crime_classification_id', 'incedent_at'
    ];
}
