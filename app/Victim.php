<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    protected $table = 'victims';
    protected $primaryKey = 'victim_id';
    protected $fillable = [
    	'name', 'address', 'occupation', 'birth_date', 'gender', 'civil_status', 'nationality'
    ];
}
