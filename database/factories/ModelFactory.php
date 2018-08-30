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
        'name' => $faker->name,
        'frequency' => $faker->sentence,
        'start_date'=>$faker->date,
        'start_time'=>$faker->time,
        'lead_start_date'=>$faker->date,
        'lead_end_date' => $faker->date,
        'location'=>$faker->sentence,
    ];
});

$factory->define(App\Role::class, function ($faker) {
    return [
        'name' => $faker->name,
        'display_name' => $faker->name,
        'description' => $faker->sentence,
    ];
});

//$factory->define(App\Team::class, function ($faker) {
//    return [
//        'name' => $faker->name,
//        'user_id' => function () {
//            return factory('App\User')->create()->id;
//        },
//    ];
//});
//
//$factory->define(App\Category::class, function ($faker) {
//    return [
//        'name' => $faker->name,
//        'description' => $faker->paragraph,
//    ];
//});