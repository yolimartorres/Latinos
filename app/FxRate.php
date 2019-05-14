<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FxRate extends Model 
{   
     use SoftDeletes;

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = ['currency_code', 'fx_rate'];

}