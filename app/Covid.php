<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Covid extends Model
{
//	use SoftDeletes;

	protected $table = 'invest_pt';
	protected $primaryKey = 'id';

	protected $fillable = [
		'id', 'sat_id'
	];

	protected $hidden = [];
	public $timestamps = false;

}
