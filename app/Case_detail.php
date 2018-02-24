<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_detail extends Model
{
    protected $table = 'case_details';
    
    protected $primaryKey = 'case_detail_id';

    protected $fillable = [
    	'case_id', 'crime_type_id', 'crime_category_id', 'crime_classification_id', 'incedent_at', 'offense_id', 'crime_location_id'
    ];

    public function casse()
    {
    	return $this->belongsTo('App\Casse', 'case_id');
    }
}
