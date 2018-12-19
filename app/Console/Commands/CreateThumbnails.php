<?php

namespace App\Console\Commands;
use App\Film;
use Storage;
use App\locandina;      
use Image;

use Illuminate\Console\Command;

class CreateThumbnails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:thumbs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates thumbnails of all images that don\'t have one';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $films = Film::all();
        foreach ($films as $film)
         {
            if ($film->locandina)
             {
              
            $path = public_path('storage/locandine/thumbnails/' . $film->id . "/" . $film->locandina->immagine);
            // echo $path . " ";
            // echo "\n";
            if (!file_exists($path)) { 
                $img = Storage::get('public/locandine/' . $film->id . "/" . $film->locandina->immagine);
                 $thumb = Image::make($img)->resize(300, null, function($constraint)
                {
                    $constraint->aspectRatio();
                 })->encode('jpg');        
            Storage::put('/public/locandine/thumbnails/'. $film->id . "/" . $film->locandina->immagine, $thumb->__toString());
        // echo "storage/locandine/thumbnails/" . $film->id . "/" . $film->locandina->immagine;
                
                                    }
            }
        }

        //     $path = 'storage/locandine/thumbnails/' . $film->id . "/" . $film->locandina->immagine;
        // echo $path . " ";
        //     if (!file_exists($path)) 
        //     echo $film->titolo. " ";
        // echo "storage/locandine/thumbnails/" . $film->id . "/" . $film->locandina->immagine;
        



           
    }
}
