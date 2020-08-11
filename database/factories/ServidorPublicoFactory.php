<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServidorPublico;
use Faker\Generator as Faker;

$factory->define(ServidorPublico::class, function (Faker $faker) {
    $curp = $faker->lexify('??????????????????');
    $ext = $faker->randomNumber(3,true);
    return [
        'nombre' => $faker->name,
        'curp' => $curp,
        'c_electronico' => $faker->unique()->safeEmail,
        'telefono_celular' => $faker->phoneNumber,
        'telefono_contacto' =>$faker->phoneNumber,
        'extension_contacto' => $ext,
    ];
});
