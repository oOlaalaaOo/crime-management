<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime_classification extends Model
{
    protected $table = 'crime_classifications';
    protected $primaryKey = 'crime_classification_id';
    protected $fillable = [
    	'crime_classification_name'
    ];
}
