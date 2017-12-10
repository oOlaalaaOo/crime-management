<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Victim_file extends Model
{
    protected $table = 'victim_files';

    protected $primaryKey = 'victim_file_id';
    
    protected $fillable = [
    	'vf_filepath', 'victim_id'
    ];
}
