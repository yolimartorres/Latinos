<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Client extends Model implements HasMedia
{   
    use HasMediaTrait;

    use SoftDeletes;

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
        'name', 'surname', 'lastname', 'phone', 'full_address', 'email', 'nid', 'nid_type', 
        'birthdate', 'ocupation'
    ];

    public function recipients()
    { 
        return $this->hasMany('App\Recipient');
    }

    public function getFullNameAttribute() {
        return $this->name . ' ' . $this->lastname;
    }

}