<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table ='sections';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable =[
        'sec_code',
        'area',
        'enabled'
    ];


    public function beneficiaries(){
        return $this->hasMany(Beneficiary::class,'ben_sec','id');
    }

    public function area_sec(){
        return $this->belongsTo(Area::class,'area','id')->with(['address_area']);
    }

}
