<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table="accounts";
    protected $fillable = [
        'TuitionFee',//ค่าเทอม
        'Other',//ค่าอื่น
        'details',//ค่าอื่น
        'cost_living',
        'Duration',
        'profile_id',
        'SendDocuments_id',
        'type_id',
    ];
}
