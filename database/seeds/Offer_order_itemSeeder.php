<?php

use Illuminate\Database\Seeder;
use App\Offer_order_item;

class Offer_order_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<=50;$i++){

            $add=new Offer_order_item();


            $add->offer_id=rand(1,10);
            $add->order_item_id=rand(1,10);


            $add->description='وصف-'.rand(0,100);
            $add->trade_mark='وصف-'.rand(0,100);
            $add->description='وصف-'.rand(0,100);
            $add->SN='وصف-'.rand(0,100);
            $add->made_in='وصف-'.rand(0,100);
            $add->expiry_date='وصف-'.rand(0,100);
            $add->unit_price=rand(0,10000);

            $add->created_at=now();
            $add->updated_at=now();
            $add->save();
        }
    }
}
