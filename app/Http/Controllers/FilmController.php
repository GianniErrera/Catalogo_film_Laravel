<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Film;
use App\locandina;      
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Storage;
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
        $generi = Film::select('genere')->distinct()->pluck('genere');
        
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
        $generi = Film::select('genere')->distinct()->get()->pluck('genere');
        return view('inserisci', compact('generi'));
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
              

       request()->validate(['locandina'=> 'dimensions:min_width=100,min_height=200|mimes:jpeg,jpg,png|min:40|max:1024', 'titolo' => 'required|min:3', 'anno' => 'required|integer|between:1896,2018', 'genere' => 'required_without:genere_nuovo', 'genere_nuovo' => 'required_without:genere', 'regista' => 'required']);
        $film = new Film();
        $film->titolo = request('titolo');
        if(request('genere') != null) {            
        $film->genere = request('genere');
            }
            else {
                $film->genere = request('genere_nuovo');
                }
        $film->anno = request('anno');
        $film->regista = request('regista');
        $film->save();
        
        if ($request->has('locandina')) {
        

        
        $id_film = $film->id;

        $nome_immagine = basename(request('locandina')->getClientOriginalName(), ".".request('locandina')->getClientOriginalExtension());
        $estensione = request('locandina')->getClientOriginalExtension();
        $immagine_filename = $nome_immagine.'_'.time().'.'.$estensione;
        $path = public_path("/locandine/thumbnails/". $id_film . "/" . $immagine_filename); 
        
        
        request('locandina')->storeAs('/public/locandine/'. $id_film, $immagine_filename);

        $img = request('locandina');
        $thumb = Image::make($img)->resize(300, null, function($constraint)
        {
            $constraint->aspectRatio();
        })->encode('jpg');        
        Storage::put('/public/locandine/thumbnails/'. $id_film . "/" . $immagine_filename, $thumb->__toString());
        
       
        $locandina = new locandina();
        $locandina->film_id = $id_film;
        $locandina->immagine = $immagine_filename;
        $locandina->descrizione = ('locandina_'.request('titolo'));
        $locandina->peso = request('locandina')->getSize();
        $locandina->save();
        }
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
        $generi = Film::select('genere')->distinct()->get()->pluck('genere');
        return view('modifica', compact('film', 'generi'));
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
         request()->validate(['locandina'=> 'dimensions:min_width=100,min_height=200|mimes:jpeg,jpg,png|min:40|max:1024','titolo' => 'required|min:3', 'anno' => 'required|integer|between:1896,2018', 'genere' => 'required_without:genere_nuovo', 'genere_nuovo' => 'required_without:genere', 'regista' => 'required']);
        //
        $film = Film::find($id);
        if(request('genere') != null) {            
        $film->genere = request('genere');
            }
            else {
                $film->genere = request('genere_nuovo');
                }
        $film->anno = request('anno');
        $film->regista = request('regista');
        $film->save();

        if ($request->has('locandina')) { 
        if ($film->locandina)
        {    

        $id_film = $film->id;
        $nome_immagine = basename(request('locandina')->getClientOriginalName(), ".".request('locandina')->getClientOriginalExtension());
        $estensione = request('locandina')->getClientOriginalExtension();
        $immagine_filename = $nome_immagine.'_'.time().'.'.$estensione;
        $percorso = request('locandina')->storeAs('public/locandine/'.$id_film, $immagine_filename);


        $img = request('locandina');
        $thumb = Image::make($img)->resize(300, null, function($constraint)
        {
            $constraint->aspectRatio();
        })->encode('jpg');        
        Storage::put('/public/locandine/thumbnails/'. $id_film . "/" . $immagine_filename, $thumb->__toString());


        $locandina =  $film->locandina;
        $locandina->film_id = $id_film;
        $locandina->immagine = $immagine_filename;
        $locandina->descrizione = ('locandina_'.request('titolo'));
        $locandina->peso = request('locandina')->getSize();
        $locandina->save();
            }

        else {
        $id_film = $film->id;
        $nome_immagine = basename(request('locandina')->getClientOriginalName(), ".".request('locandina')->getClientOriginalExtension());
        $estensione = request('locandina')->getClientOriginalExtension();
        $immagine_filename = $nome_immagine.'_'.time().'.'.$estensione;
        $percorso = request('locandina')->storeAs('public/locandine/'.$id_film, $immagine_filename);

        $img = request('locandina');        
        $thumb = Image::make($img)->resize(300, null, function($constraint)
        {
            $constraint->aspectRatio();
        })->encode('jpg');
        
        
        Storage::put('/public/locandine/thumbnails/'. $id_film . "/" . $immagine_filename, $thumb->__toString());

        $locandina = new Locandina();
        $locandina->film_id = $id_film;
        $locandina->immagine = $immagine_filename;
        $locandina->descrizione = ('locandina_'.request('titolo'));
        $locandina->peso = request('locandina')->getSize();
        $locandina->save();

        }

        }
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