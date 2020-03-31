<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;

$faker = Faker\Factory::create('fa_IR');

$factory->define(User::class, function () use ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'email_verified_at' => now(),
        'password' => \Hash::make('123456789'),
    ];
});
