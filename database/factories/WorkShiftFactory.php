<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\WorkShift;
use Faker\Generator as Faker;

$factory->define(WorkShift::class, function (Faker $faker) {
    return [
        'Ten_Ca' => $faker->unique()->randomElement(['Morning 7h-12h', 'Afternoon 12h-17h', 'Evening 17h-22h']),
        'He_So_Ca' => $faker->unique()->randomElement(['1,1','1,0','1,3'])
    ];
});
