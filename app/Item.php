<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    public $table = 'items';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'item_name',
        'item_category_id',
        'item_description',
        'item_issu_date',
        'item_exp_date',
        'status',
        'created_at',
        'updated_at',
    ];
   

    public function item_category()
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }

    public function item_country()
    {
        return $this->belongsTo(Country::class, 'item_country_made');
    }


}
