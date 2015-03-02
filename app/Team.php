<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

	protected $table = 'teams'; //is this necessary? -lee
	protected $fillable = ['name','code'];

	public function user() {
		return $this->hasMany('App\User');
	}

}
