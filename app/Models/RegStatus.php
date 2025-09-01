<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class RegStatus extends Model
{
    protected $fillable = [
        'status',
    ];

    protected $table = 'status';

    public static function getRegStatuses()
    {
        $retVal = [];

        foreach (self::orderBy('status')->get() as $status) {
            $retVal[$status->status] = $status->status;
        }

        asort($retVal);

        return ['' => 'Select a status'] + $retVal;
    }
}
