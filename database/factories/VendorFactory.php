<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'userId'  => factory(\App\User::class) ,
        'name' => $faker->company,
        'slug'  => Str::slug($faker->company),
        'logo'  => $faker->image(public_path('/storage'), 300, 300, 'cats', true, true, 'Job'),
        'des'  => $faker->text($maxNbChars = 200),
        'type' => $faker->randomElement($array = array (
                          'groceries',
                          'restaurants',
                          'shop',
                          'others',
                        )),
                          
        'status'=> $faker->boolean(),
    ];
});
