<?php
namespace App\Repositories;

use Session;

class SessRepository
{
	public function get(){
		return Session::get('FORM_DATA_ADD');
	}
}
