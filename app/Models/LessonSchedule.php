<?PHP

namespace App\Models;

use LaravelRocket\Foundation\Models\Base;

/**
 * App\Models\LessonSchedule.
 *
 * @method \App\Presenters\LessonSchedulePresenter present()
 *
 */

class LessonSchedule extends Base
{



    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'lesson_schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'lesson_id',
        'lesson_title',
        'lesson_round',
        'lesson_round_title',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var  array
     */
    protected $hidden = [];

    protected $dates  = [
    ];

    protected $casts     = [
    ];

    protected $presenter = \App\Presenters\LessonSchedulePresenter::class;

    // Relations
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id');
    }


    // Utility Functions

}
