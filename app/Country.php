<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
   
    public $table = 'countries';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'country_name',
        'country_code',
        'description',
        'created_at',
        'updated_at',
    ];

    public function cities()
    {
        return $this->hasMany(Country::class, 'country_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(Country::class, 'item_country_made', 'id');
    }

   
    
}
