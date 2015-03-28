<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

	protected $table = 'teams';

	protected $fillable = ['team_name', 'team_code'];

	public function user() {
		return $this->hasMany('App\User'); //->where('user_parent', 0);
	}
	 
	public function manager() {
		return $this->hasOne('App\User', 'user_id', 'manager_id'); //user_id = FK manager_id = LOCAL KEY
	}

}
