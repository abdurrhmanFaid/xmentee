<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\BandRequest::class, function (Faker $faker) {
    return [
        'band_name' => $faker->text(24),
        'owner_email' => $faker->email,
        'band_description' => $faker->paragraph,
        'members_count' => rand(1, 100),

    ];
});
