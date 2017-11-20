<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_victim extends Model
{
    protected $table = 'case_victims';
    protected $primaryKey = 'case_victim_id';
    protected $fillable = [
    	'victim_id', 'victim_status'
    ];
}
