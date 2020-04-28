<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Ticket::class, function (Faker $faker) {
    return [
        'owner_name' => $faker->name,
        'band_id' => function() {return factory(\App\Models\Band::class)->create();},
        'code' => $faker->slug,
        'password' => $faker->password,
    ];
});
