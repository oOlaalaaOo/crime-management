<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casse extends Model
{
    protected $table = 'cases';
    protected $primaryKey = 'case_id';
    protected $fillable = [
    	'case_victim_id', 'case_suspect_id', 'case_detail_id', 'case_blotter_id', 'case_status'
    ];

 	public function victim() {
 		return $this->hasOne('App\Victim');
 	}

 	public function suspect() {
 		return $this->hasOne('App\Suspect');
 	}

 	public function case_detail() {
 		return $this->hasOne('App\Case_detail');
 	}

 	public function blotter() {
 		return $this->hasOne('App\Blotter');
 	}
 	
}
