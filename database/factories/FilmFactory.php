<?php

use Faker\Generator as Faker;
use App\Film;

$factory->define(Film::class, function (Faker $faker) {
    return ['titolo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    'anno' => $faker->numberBetween(1950, 2018), 'regista' => $faker->name, 'genere' => $faker->randomElement($array = array ('horror','drammatico','musical', 'sentimentale', 'commedia', 'cartoni animati', 'documentario', 'biografico')) 
    ];
});
