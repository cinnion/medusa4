<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

/**
 * Class ChangeRequest.
 *
 * @property string user
 * @property string requestor
 * @property string status
 * @property string req_type
 * @property string old_value
 * @property string new_value
 * @property \Illuminate\Support\Carbon|null created_at
 * @property \Illuminate\Support\Carbon|null updated_at
 * @property \Illuminate\Support\Carbon|null deleted_at
 */
class ChangeRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user',
        'requestor',
        'req_type',
        'old_value',
        'new_value',
        'status'
    ];
}
