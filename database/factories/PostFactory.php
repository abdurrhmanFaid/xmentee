<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $title = $faker->text(12),
        'body' => $faker->realText(1000),
        'type' => $faker->randomElement(['question', 'information', 'advice', 'other']),
        'user_id' => function () {return factory(\App\Models\User::class)->create()->id;},
        'category_id' => function () {return factory(\App\Models\Category::class)->create()->id;},
        'band_id' => function () {return factory(\App\Models\Band::class)->create()->id;},
    ];
});
