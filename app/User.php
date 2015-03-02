<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $fillable = ['firstname', 'lastname', 'email', 'username', 'password'];

	protected $hidden = ['password', 'remember_token'];

	public function getAuthPassword() {
    	return $this->password;
	}

	public function getAuthIdentifier() {
   	return $this->username;
	}

	public function team() {
		return $this->belongsTo('App\Team');
	}

	public function leave() {
		return $this->hasMany('App\Leave');
	}
}
