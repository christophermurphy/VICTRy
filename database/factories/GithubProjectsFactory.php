<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GithubProjects;
use Faker\Generator as Faker;

$factory->define(GithubProjects::class, function (Faker $faker) {
    return [
    'repo_id' => $faker->randomNumber(5),
    'name' => $faker->name,
    'url' => $faker->url,
    'created_date' => $faker->dateTime,
    'last_push_date' => $faker->dateTime,
    'description' => $faker->text(),
    'stargazers_count' => $faker->randomNumber(),
    ];
});
