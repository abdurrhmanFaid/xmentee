<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->text(12),
        'slug' => \Str::slug($name),
        'description' => $faker->text(12),
        'band_id' => function () {return factory(\App\Models\Band::class)->create()->id;},
    ];
});
