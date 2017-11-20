<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_log extends Model
{
    protected $table = 'user_logs';
    protected $primaryKey = 'user_log_id';
    protected $fillable = [
    	'user_id', 'activity'
    ];

    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
