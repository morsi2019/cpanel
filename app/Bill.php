<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];
    public $table='bills';

    public function company(){
    return $this->belongsTo(User::class, 'company_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
