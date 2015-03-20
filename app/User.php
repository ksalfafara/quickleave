<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $fillable = ['username', 'password', 'firstname', 'lastname', 'email', 'sl_bal', 'vl_bal', 'role', 'team_id'];

	protected $hidden = ['password', 'remember_token'];

	public function team() {
		return $this->belongsTo('App\Team');
	}

	public function leave() {
		return $this->hasMany('App\Leave');
	}
}
