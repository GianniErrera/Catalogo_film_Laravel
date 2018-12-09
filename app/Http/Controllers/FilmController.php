<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $generi = Film::select('genere')->distinct()->get()->pluck('genere');
        
        $films = Film::orderBy('created_at', 'desc')->paginate(10);
        // dd($films);
        return view('test', compact('films', 'generi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('inserisci');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $film = new Film();
        $film->titolo = request('titolo');
        $film->anno = request('anno');
        $film->genere = request('genere');
        $film->regista = request('regista');
        $film->save();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $generi = Film::select('genere')->distinct()->get();

        $film = Film::find($id);
        // dd($film->titolo);
        return view('film', compact('film'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $film = Film::find($id);
        return view('modifica', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $film = Film::find($id);
        $film->titolo = request('titolo');
        $film->anno = request('anno');
        $film->genere = request('genere');
        $film->regista = request('regista');
        $film->save();

        Session::flash('message', 'Film modificato con successo!');
            return Redirect::action('FilmController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
