<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Film;

class ValidaFilm extends Controller
{
    //

public function update($id)
    {
  
    	$film = Film::find($id);
    	$film->validato = 1;
    	$film->save();
    	return back();

    }


}
