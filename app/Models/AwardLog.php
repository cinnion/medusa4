<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class AwardLog extends Model
{
    /** @use HasFactory<\Database\Factories\AwardLogFactory> */
    use HasFactory;

    protected $fillable = [
        'timestamp',
        'member_id',
        'award',
        'qty'
    ];

    public $timestamps = false;

    public static function getAwardLogData($params = [])
    {
        if (empty($params) === true) {
            // Return everything
            return self::all();
        }

        $query = self::query();

        foreach ($params as $param => $value) {
            switch ($param) {
                case 'start':
                    $query->where('timestamp', '>=', strtotime($value));
                    break;
                case 'end':
                    $query->where('timestamp', '<=', strtotime($value));
                    break;
                case 'award':
                    $query->where('award', $value);
                    break;
                case 'member_id':
                    $query->where('member_id', $value);
                    break;
            }
        }

        return $query->get();
    }
}
