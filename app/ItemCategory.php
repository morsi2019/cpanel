<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategory extends Model
{
    public $table = 'item_categories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'item_cat_name',
        'created_at',
        'updated_at',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'item_category_id', 'id');
    }

  
}
