<?php

use Illuminate\Database\Seeder;
use App\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //


        for($i=0;$i<=50;$i++){

            $add=new Offer();

            $add->user_id=rand(1,9);
            $add->order_id=rand(1,9);


            $add->warranty_policy='وصف وصف-'.rand(0,100);
            $add->payment_terms='وصف وصف-'.rand(0,100);
            $add->shipping_policy='وصف وصف-'.rand(0,100);
            $add->refund_terms='وصف وصف-'.rand(0,100);
            $add->delivery_term='وصف وصف-'.rand(0,100);
            $add->validity_offer='وصف وصف-'.rand(0,100);
            $add->lowest_amount=rand(0,10000);
            $add->total_amount=rand(0,10000);

            $add->created_at=now();
            $add->updated_at=now();
            $add->save();
        }
    }
}
