<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function ($faker) {
    return [
        'owner_id' => function () {
            return factory('App\Owner')->create()->id;
        },
        'category_id' => function () {
            return factory('App\Category')->create()->id;
        },
        'team_id' => function () {
            return factory('App\Team')->create()->id;
        },
        'name' => $faker->sentence,
        'frequency' => $faker->sentence,
        'start_date_and_time'=>$faker->dateTime,
        'lead_start_date'=>$faker->date,
        'lead_duration'=>$faker->sentence,
    ];
});

$factory->define(App\Owner::class, function ($faker) {
    return [
        'team_id' => function () {
            return factory('App\Team')->create()->id;
        },
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Team::class, function ($faker) {
    return [
        'name' => $faker->name,
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
    ];
});

$factory->define(App\Category::class, function ($faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});