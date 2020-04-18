<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Product::class, function (Faker $faker) {

    return [
      'vendorId' => factory(\App\Vendor::class),
      'product_name' => $faker->word,
      'productSlug' => Str::slug($faker->word),
      'product_pic' => $faker->randomElement($array = array ('http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/mens-better-than-naked-jacket-AVMH_LC9_hero.png',
                        'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-better-than-naked-jacket-AVKL_NN4_hero.png',
                        'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-single-track-shoe-ALQF_JM3_hero.png',
                        'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/enduro-boa-hydration-pack-AJQZ_JK3_hero.png',
                      )),
      'product_price' => $faker->randomFloat(2, 10, 100),
      'product_desc' => $faker->realText(200),
      'product_full_desc' => $faker->realText(200),
      'product_type' => $faker->randomElement($array = array (
                        'food',
                        'Wears',
                        'Things',
                        'Services',
                        'Others',
                      )),
      'status' => $faker->boolean()
    ];
});
