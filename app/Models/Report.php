<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'promotion_actions',
        'award_actions',
        'courses',
        'activities',
        'problems',
        'questions',
        'report_sent',
        'command_crew',
        'new_crew',
        'chapter_id',
        'chapter_info',
        'report_date',
    ];

    /**
     * @codeCoverageIgnore
     */
    public function getDraftReport()
    {
    }
}
