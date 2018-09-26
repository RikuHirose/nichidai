<?PHP

namespace App\Models;

use LaravelRocket\Foundation\Models\Base;

use App\Models\Favorite;

/**
 * App\Models\Lesson.
 *
 * @method \App\Presenters\LessonPresenter present()
 *
 */

class Lesson extends Base
{



    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'faculty_id',
        'popular_id',
        'recommend_id',
        'sub_title',
        'subsub_title',
        'lesson_title',
        'lesson_term',
        'lesson_date',
        'lesson_hour',
        'lesson_credit',
        'lesson_professor',
        'lesson_objectives',
        'lesson_content',
        'lesson_style',
        'lesson_evaluation',
        'lesson_textbook',
        'lesson_read',
        'lesson_officehour',
        'lesson_info',
        'evaluate_exam',
        'evaluate_report',
        'evaluate_mintest',
        'evaluate_apply',
        'evaluate_others',
        'evaluate_total',
        'url',
        'year',
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

    protected $presenter = \App\Presenters\LessonPresenter::class;

    // Relations
    public function lessonSchedules()
    {
        return $this->hasMany(\App\Models\LessonSchedule::class, 'lesson_id', 'id');
    }

    public function affiliates()
    {
        return $this->hasMany(\App\Models\Affiliate::class, 'lesson_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(\App\Models\Favorite::class, 'lesson_id', 'id');
    }


    // Utility Functions


}
