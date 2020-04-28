<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    return [
        'user_id' => function () {return factory(\App\Models\User::class)->create()->id;},
        'body' => $faker->text(255),
        'commentable_id' => function () {return factory(\App\Models\Post::class)->create()->id;},
        'commentable_type' => 'App\Models\Post',
        'visible_user' => true,
    ];
});
