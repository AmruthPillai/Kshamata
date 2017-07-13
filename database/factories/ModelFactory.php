<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Woman::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name('female'),
        'dob' => $faker->date,
        'photo' => 'images/blank_woman_avatar.png',
        'skills' => serialize($faker->randomElements($array = array ('cooking','knitting','stitching','cleaning'), 2)),
    ];
});

$factory->define(\App\TrackRecord::class, function (Faker\Generator $faker) {
    return [
        'employer_name' => $faker->name,
        'salary' => $faker->numberBetween(1000, 6000),
        'location' => $faker->latitude . ',' . $faker->longitude,
    ];
});
