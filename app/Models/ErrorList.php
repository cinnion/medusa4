<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ErrorList extends Model
{
    protected $fillable = ['severity', 'source', 'msg'];

    protected $table = 'error_list';
}
