<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generi = Film::select('genere')->distinct()->pluck('genere');
        $films = Film::orderBy('created_at', 'desc')->paginate(10);
        // dd($films);
        return view('admin_test', compact('films', 'generi'));
    }

    public function test()
    {
        $generi = Film::select('genere')->distinct()->pluck('genere');
        $films = Film::orderBy('created_at', 'desc')->paginate(10);
        // dd($films);
        return view('admin_test', compact('films', 'generi'));
        // return view('test');
    }


    public function generi()
    {

    	$genere = request('genere');

        if ($genere == 'tutti')  {
            return redirect('/segreto/admin');
        }  
        $generi = Film::select('genere')->distinct()->pluck('genere');
    
        $films = Film::where('genere', $genere)->orderBy('created_at', 'desc')->paginate(10);
        // dd($films);
        return view('admin', compact('films', 'generi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $film = Film::find($id);        
        return view('admin_film', compact('film'));
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
