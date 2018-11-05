<?php
namespace App\Http\Models;

use Eloquent;
class User extends Model {

	public static function LoginBy($data){
		return self::where('username', $data['username'])->where('password', md5($data['password']))->get();
	}
}