<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->firstName,
        'back_name'         => $faker->lastName,
        'address'           => $faker->address,
        'city'              => $faker->city ,
        'region'            => $faker->postcode,
        'phone'             => '08970898910',
        'age'               => '18',
        'username'          => $faker->userName,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => bcrypt('admin'), // password
        'token'             => Str::random(60),
        'role'             => 'admin',
        'foto'              => $faker->imageUrl($width = 200, $height = 200),
        'remember_token'    => Str::random(10),
        'created_at'        => Carbon::now(),
    ];
});
