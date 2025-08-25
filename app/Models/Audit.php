<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Model;

class Audit extends Model
{
    /***
     * @var string[] The attributes that are mass assignable.
     */
    protected $fillable = [
        'member_id',
        'action',
        'collection_name',
        'document_id',
        'document_values',
        'from_where'
    ];

    protected $table = 'audit_trail';
}
