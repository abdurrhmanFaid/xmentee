<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Batch::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->text(12),
        'slug' => \Str::slug($name),
        'band_id' => function () {return factory(\App\Models\Band::class)->create()->id;},
    ];
});
