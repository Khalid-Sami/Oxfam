<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='address';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable =[
        'governorate',
        'city',
        'locality',
        'enabled'
    ];

    public function area(){
        return $this->hasMany(Area::class,'address_id','id');
    }
}
