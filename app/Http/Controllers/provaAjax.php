<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Film;

class provaAjax extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('prova_random_number');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $numero = rand(1, 100);
        
        return '<h1>' . $numero . '</h1>' ;
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
    }

    public function home()
    {


        return "stringa";

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
        // $titolo = Film::find($id)->titolo;

        
        $titolo = urlencode(Film::find($id)->titolo);
        

        $apikey = "1543505e";


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://www.omdbapi.com/?t=$titolo&apikey=$apikey",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $response = json_decode($response, true); //because of true, it's in an array

    if ($response['Response'] != "False"){

    $bottone_per_aggiornare_info = ""; 
        $film = Film::find($id);
    if ($film->titolo != $response['Title'] ||  $film->anno !=$response['Year']  ||  $film->regista !=$response['Director'])  {
        $bottone_per_aggiornare_info = '<button class = "update" id = ' . $id . " style = 'margin-top: 10px' >Clicca qui per aggiornare info</button>";
    } 
    $ricerca = "<b>Titolo: </b>" . $response['Title'] . "<br><b>Anno: </b>" . $response['Year'] . '<br><b>Regista: </b>' . $response['Director'] . "<br>" . $bottone_per_aggiornare_info .  "{{ Film::find(24)->anno}}";

    }
    else
    {$ricerca = "<h5><b>Titolo non trovato</b></h5>";
    }

    return $ricerca;

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
