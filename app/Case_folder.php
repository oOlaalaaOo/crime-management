<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_folder extends Model
{
    protected $table = 'case_folders';
    protected $primaryKey = 'case_folder_id';
    protected $fillable = [
    	'case_id', 'case_image'
    ];
}
