<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Band::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->text(20),
        'slug' => \Str::slug($name),
        'description' => $faker->text(100),
        'address' => $faker->address,
        'applying_deadline' => $faker->dateTime,
        'members_count' => 0
    ];
});
