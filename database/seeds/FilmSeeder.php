<?php

use Illuminate\Database\Seeder;
use App\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(Film::class, 20)->create();
        
    }
}
