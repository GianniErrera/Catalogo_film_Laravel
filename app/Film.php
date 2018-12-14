<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    public function locandina() {
    	return $this->hasOne(Locandina::class);

    }
}
