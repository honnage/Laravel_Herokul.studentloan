<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendDocumentModel extends Model
{
    protected $table="send_documents";
    protected $fillable = [
        'Student_ID',
        'academy',
        'faculty',
        'major',
        'year',
        'school_year',
        'term',
        'recovery_status',
        'document_status',
        'description',
        'profile_id',
        'type_id',
        'SendDocuments_id',
    ];
}
