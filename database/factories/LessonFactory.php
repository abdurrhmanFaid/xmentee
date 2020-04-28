<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->text(22),
        'description' => $faker->paragraph,
        'slug' => uniqid(),
        'video_path' => $faker->url,
        'batch_id' => function () {return factory(\App\Models\Batch::class)->create()->id;},
        'category_id' => function () {return factory(\App\Models\Category::class)->create()->id;},
        'playlist_id' => function () {return factory(\App\Models\Playlist::class)->create()->id;},
    ];
});
