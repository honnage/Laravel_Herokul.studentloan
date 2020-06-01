<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    protected $table="profiles";
    protected $fillable = [
        'IdentificationCode',
        'fname',
        'lname',
        'birthdate',
        'gender',
        'phone',
        'email',
        'address',
        'user_id',
    ];
}
