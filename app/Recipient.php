<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Model 
{   
     use SoftDeletes;

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
        'client_id', 'name', 'surname', 'lastname', 'phone', 'full_address', 'email', 'nid', 'nid_type', 
        'bank_name', 'account_number'
    ];

    public function client()
    {
    	return $this->belongsTo('App\Client')->withTrashed();
    }

    public function getFullNameAttribute() {
        return $this->name . ' ' . $this->lastname;
    }
}