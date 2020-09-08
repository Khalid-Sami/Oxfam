<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $table='areas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable =[
        'area_name',
        'address_id',
        'enabled'
    ];
    public function sections(){

        return $this->hasMany(Area::class,'area','id');
    }

    public function address_area(){
        return $this->belongsTo(Address::class,'address_id','id');
    }




}
