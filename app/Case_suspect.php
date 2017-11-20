<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_suspect extends Model
{
    protected $table = 'case_suspects';
    protected $primaryKey = 'case_suspect_id';
    protected $fillable = [
    	'suspect_id', 'status'
    ];
}
