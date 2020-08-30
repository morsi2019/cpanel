<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';

    protected $dates = 
    [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = 
    [
        'company_name',
        'company_com_record',
        'company_issue_date',
        'company_country',
        'company_city',
        'company_street',
        'company_building',
        'company_email',
        'company_mobile',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    
    public function country()
    {
        return $this->belongsTo(Country::class, 'company_country');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'company_city');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'company_id');
    }


}
