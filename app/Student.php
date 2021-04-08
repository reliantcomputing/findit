<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        "firstName", "lastName", "studentNumber",
        "email", "location","description"
    ];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }



    public function picture()
    {
        return $this->hasOne('App\Picture');
    }
}
