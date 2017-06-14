<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
	public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('j F Y - H:i');
	}

	public function getUpdatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('j F Y - H:i');
	}

}
