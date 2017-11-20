<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_rank extends Model
{
    protected $table = 'user_ranks';
    protected $primaryKey = 'user_rank_id';
    protected $fillable = [
    	'code'
    ];
}
