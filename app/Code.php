<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Code extends Model
{
	protected $guarded = [];
    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
?>