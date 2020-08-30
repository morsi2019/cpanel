<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call([
                      CountrySeeder::class,
                      ItemSeeder::class,
                      OfferSeeder::class,
                      OrderSeeder::class,
                      Offer_order_itemSeeder::class,
                      Order_itemSeeder::class
                    ]);


    }
}
