<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        "firstName", "lastName", "country",
        "region", "street", "postalCode","email"
    ];
}
