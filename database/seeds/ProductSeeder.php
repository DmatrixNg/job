<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    for ($i=0; $i < 5; $i++) {
      factory(\App\User::class)->make();
    }
    foreach (\App\User::all() as $value) {
      $vendor = factory(\App\Vendor::class, 5)->create(['userId' => $value->id]);
      foreach (\App\Vendor::all() as $value) {
        $vendor = factory(\App\Product::class, 5)->create(['vendorId' => $value->id]);
      }
    }
    }
}
