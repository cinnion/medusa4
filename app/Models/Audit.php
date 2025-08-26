<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Model;

/**
 * Class Audit.
 *
 * @property string member_id
 * @property string action
 * @property string collection_name
 * @property string document_id
 * @property array document_values
 * @property string from_where
 * @property \MongoDB\BSON\UTCDateTime created_at
 * @property \MongoDB\BSON\UTCDateTime updated_at
 */
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
