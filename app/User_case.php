<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_case extends Model
{
    protected $table = 'user_cases';
    protected $primaryKey = 'user_case_id';
    protected $fillable = [
    	'user_id', 'case_id'
    ];

    public function cases() {
    	return $this->hasMany('App\Casse', 'case_id');
    }

}
