<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected  $table= 'vendors';
    protected $primaryKey = 'ven_no';
    public $timestamps = false;

    protected $fillable =[
        'ven_name',
        'ven_email',
        'ven_phone',
    ];
    public function areas(){
        return $this->hasMany(VendorAreas::class,'vendor_id','ven_no')->with(['area']);
    }
}
