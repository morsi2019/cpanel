<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'city_name',
        'country_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    
    
    public function countries()
    {
        //return $this->belongsTo(Country::Class);

        return $this->belongsTo(Country::class, 'country_id');
    }

    public function health()
    {
        return $this->hasMany(Health::class, 'health_city', 'id');
    }

    public function company()
    {
        return $this->hasMany(Company::class, 'company_city', 'id');
    }

    
}
