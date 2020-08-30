<?php

use Illuminate\Database\Seeder;
use App\Item;
use \Carbon\Carbon;

class ItemSeeder extends Seeder
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


            $add=new Item();
            $year = rand(2019, 2020);
            $month = rand(1, 12);
            $day = rand(1, 30);
            $date = Carbon::create($year,$month ,$day , 0, 0, 0);

            $add->item_category_id= rand(1,9);
            $add->item_name='name-'.rand(1,9);
            $add->item_description='description-'.rand(0,1);

            $add->item_issu_date=$date->format('Y-m-d H:i:s');
            $year = rand(2019, 2020);
            $month = rand(1, 12);
            $day = rand(1, 30);
            $date = Carbon::create($year,$month ,$day , 0, 0, 0);
            $add->item_exp_date=$date->format('Y-m-d H:i:s');
            $add->item_country_made=rand(0,100);
            $add->created_at=now();
            $add->updated_at=now();
            $add->save();
        }
    }
}
