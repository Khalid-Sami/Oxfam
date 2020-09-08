<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected  $table= 'beneficiaries';

    protected $fillable =[
        'ben_no',
        'ben_name',
        'ben_id',
        'ben_sec',
        'mobile',
        'ben_add'
    ];

    public function section(){
        return $this->belongsTo(Section::class,'ben_sec','id')->with(['area_sec']);
    }

    public $timestamps = false;

}
