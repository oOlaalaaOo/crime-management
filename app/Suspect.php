<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    protected $table = 'suspects';
    protected $primaryKey = 'suspect_id';
    protected $fillable = [
    	'name', 'address', 'occupation', 'birth_date', 'gender', 'civil_status', 'nationality'
    ];
}
