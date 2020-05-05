<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\BacLuong;
use Faker\Generator as Faker;

$factory->define(BacLuong::class, function (Faker $faker) {
    return [
        'Bac_Luong' => $faker->unique()->randomFloat(1, 1, 3)
    ];
});
