<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	// disable mass assignment by setting to empty array because we are being particular about the data we are able to pass to the model in the controller (request validation)
	protected $guarded = [];

	
    public function user() {

    	return $this->belongsTo(User::class);
    }
}
