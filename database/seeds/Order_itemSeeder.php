<?php

use Illuminate\Database\Seeder;
use App\Order_item;

class Order_itemSeeder extends Seeder
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


           $add=new Order_item();


            $add->order_id=rand(1,10);
            $add->item_id=rand(1,10);
            $add->description='وصف-'.rand(0,100);
            $add->unit='كرتون-'.rand(0,100);
            $add->quantity=rand(1,10000);
            $add->created_at=now();
            $add->updated_at=now();
            $add->save();
        }
    }
}
