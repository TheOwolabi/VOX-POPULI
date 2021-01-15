<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
    return [
        'topic' => $faker->sentence(),
        'content' => $faker->paragraph(rand(5,15),true),
        'likes'=>rand(0,100),
        'unlikes'=>rand(0,100),
        'subtitle'=>$faker->sentence(),
    ];
});
