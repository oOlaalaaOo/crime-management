<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_blotter extends Model
{
    protected $table = 'case_blotters';
    protected $primaryKey = 'case_blotter_id';
    protected $fillable = [
    	'entry_no', 'reported_at'
    ];
}
