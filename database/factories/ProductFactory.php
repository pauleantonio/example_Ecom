<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'prod_name' => $faker->company,
        'prod_description' => $faker->paragraph(),
        'prod_price' => $faker->randomFloat(2, $min = 0, $max = 1000),

      
    ];
});
