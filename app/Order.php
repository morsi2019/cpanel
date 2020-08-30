<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];

    public $table='orders';
    public function  user()
    {
        return $this->belongsTo('App\User');
    }
    public function  offers()
    {
        return $this->hasMany('App\Offer');
    }
    public function items()
    {
        return $this->belongsToMany('App\Item','order_items','item_id', 'order_id')
            ->using('App\Order_item')
            ->withPivot([
                'description',
                'status',
                'unit',
                'quantity',
            ])->withTimestamps()
            ->selectRaw('items.*, sum(order_items.quantity) as pivot_quantity')
            ->groupBy('pivot_item_id','pivot_order_id');
    }

    public function  order_items()
    {
        return $this->hasMany('App\Order_item');
    }

}

