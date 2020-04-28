<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->text(12),
        'description' => $faker->text(100),
        'members_count' => 0,
        'points' => 0,
        'batch_id' => function () {return factory(\App\Models\Batch::class)->create()->id;},
    ];
});
