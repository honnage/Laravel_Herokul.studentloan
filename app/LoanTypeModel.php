<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanTypeModel extends Model
{
    protected $table="loan_types";
    protected $fillable = [
        'code',
        'type',
        'salary',
    ];
}
