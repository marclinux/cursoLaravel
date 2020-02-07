<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Site_type;
use Faker\Generator as Faker;

$factory->define(Site_type::class, function (Faker $faker) {
    return [
        'name' => $faker->Company,
        'active' => true
    ];
});
