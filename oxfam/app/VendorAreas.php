<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorAreas extends Model
{
    protected  $table= 'vendor_areas';
    protected $primaryKey = 'v_id';
    public $timestamps = false;

    protected $fillable =[
        'vendor_id',
        'area_id'
    ];

    public function area(){
        return $this->belongsTo(Area::class,'area_id','id');
    }

    public function vendor(){
        return $this->belongsTo(Area::class,'vendor_id','ven_no');
    }
}
