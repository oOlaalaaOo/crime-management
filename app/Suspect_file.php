<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suspect_file extends Model
{
    protected $table = 'suspect_files';

    protected $primaryKey = 'suspect_file_id';
    
    protected $fillable = [
    	'sf_filepath', 'suspect_id'
    ];
}
