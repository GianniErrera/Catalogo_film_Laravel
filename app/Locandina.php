<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locandina extends Model
{
    //

    public function film() {

    	return $this->belongsTo(Film::class);

    }
}
