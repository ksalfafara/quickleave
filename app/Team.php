<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

	protected $table = 'teams';

	protected $fillable = ['team_name', 'team_code'];

	public function user() {
		return $this->hasMany('App\User'); //->where('user_parent', 0);
	}

	public function leave() {
	//	return $this->hasManyThrough('Leaves', 'Users', 'team_id', 'user_id');
		return $this->hasMany('App/Leave');
	}
	 

}
