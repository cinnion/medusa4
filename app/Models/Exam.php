<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'exams'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'member_id', 'member_id');
    }
}
