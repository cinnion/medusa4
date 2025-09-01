<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

/**
 * @property id
 * @property updated_at
 *
 * @property string _method
 * @property string _token
 * @property string activities
 * @property string award_actions
 * @property string chapter_id
 * @property array chapter_info
 * @property array command_crew
 * @property string courses
 * @property array new_crew
 * @property string problems
 * @property string promotion_actions
 * @property string questions
 * @property string report_date
 * @property date report_sent
 * @property string send_report
 */
class Report extends Model
{
    protected $fillable = [
        'activities',
        'award_actions',
        'chapter_id',
        'chapter_info',
        'command_crew',
        'courses',
        'new_crew',
        'problems',
        'promotion_actions',
        'questions',
        'report_date',
        'report_sent',
    ];

    /**
     * @codeCoverageIgnore
     */
    public function getDraftReport()
    {
    }
}
