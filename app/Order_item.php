<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class Order_item extends Pivot
{
    //
    public $incrementing = true;
    public $table = 'order_items';
    public $primaryKey='id';

    public function orders()
    {
        return $this->belongsTo('App\Offer');
    }

    public function offers()
    {

        return $this->belongsToMany('App\Offer','offer_order_items','offer_id','order_item_id')
            ->using('App\Offer_order_item')
            ->withPivot([
                'status',
                'description',
                'trade_mark',
                'made_in',
                'SN',
                'expiry_date',
                'unit_price',
                'picture',
            ])->withTimestamps();;
    }
}
