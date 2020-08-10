<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServidorPublico;
use Faker\Generator as Faker;

$factory->define(ServidorPublico::class, function (Faker $faker) {
    $curp = $faker->lexify('??????????????????');
    $cuenta = $faker->randomNumber(6,true);
    return [
        'nombre' => $faker->name,
        'curp' => $curp,
        'cuenta' => $cuenta,
        'c_electronico' => $faker->unique()->safeEmail,
        'telefono' => $faker->phoneNumber,
        'password' => $curp."_".$cuenta,
    ];
});
