<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

	protected $table = 'teams';

	protected $fillable = ['team_name', 'team_code'];

	public function user() {
		return $this->hasMany('App\User');
	}
}
