<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table ='view_transactions';

    protected $fillable =[
        'ben_no',
        'ben_name',
        'ben_id',
        'area_name',
        'area_id',
        'sec_code',
        'sec_id',
        'trans_water_amount',
        'trans_date',
    ];
}
