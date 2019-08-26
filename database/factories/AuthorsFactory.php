<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(Author::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->dateTimeBetween(Carbon::now()->subYears(70), Carbon::now()->subYears(30)),
        'address' => function() use($faker){
            return $faker->city . ', ' . $faker->streetName . ' ' . $faker->buildingNumber;
        },
    ];
});
