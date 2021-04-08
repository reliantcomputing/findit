<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    protected $fillable = ['category'];
}
