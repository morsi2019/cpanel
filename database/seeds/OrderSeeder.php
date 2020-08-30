<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         for($i=0;$i<=50;$i++){

           $add=new Order();

            $add->user_id=rand(1,9);
            $add->main_id=rand(1,9);
            $add->shareable=rand(0,1);
            $add->enterprise=rand(0,9);
            $add->phone='77'.rand(0,77777);
            $add->country='السعودية-'.rand(0,100);
            $add->city='تبوك'.rand(0,77777);
            $add->street='الفيصل'.rand(0,77777);
            $add->created_at=now();
            $add->updated_at=now();
            $add->save();
        }
    }
}
