<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'status', 'user_type_id', 'police_station_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_logs() {
        return $this->hasMany('App\User_log', 'id');
    }

    public function user_cases() {
        return $this->hasMany('App\User_case', 'id');
    }

    public function user_type() {
        return $this->hasOne('App\User_type', 'user_type_id');
    }
}
