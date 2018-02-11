<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    protected $table = 'blotters';

    protected $fillable = [
    	'blotter_title', 'blotter_content', 'complainant_name', 'complainant_address', 'complainant_contact_no'
    ];

    protected $primaryKey = 'blotter_id';
}
