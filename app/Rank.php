<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';
    protected $primaryKey = 'rank_id';
    protected $fillable = [
    	'code', 'description'
    ];
}
