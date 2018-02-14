<?php

namespace App\Libraries;

use App\User_log;
use Auth;
use DB;
use Validator;

class Userlog
{
	protected $user_id;
	protected $activity;

	public function __construct()
	{

	}

	public function add($user_id, $activity)
	{
		$data = new User_log;

		$data->user_id = $user_id;
		$data->activity = $activity;

		if ($data->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}