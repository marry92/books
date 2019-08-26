<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Models\Author;

$authors = Author::inRandomOrder()->take(100)->get();


$factory->define(Book::class, function (Faker $faker) use($authors) {
    return [
        'name' => $faker->sentence(),
        'release_date' => $faker->dateTimeBetween(Carbon::now()->subYears(30), Carbon::now()),
        'author_id' => $faker->randomElement($authors)->id,
    ];
});
