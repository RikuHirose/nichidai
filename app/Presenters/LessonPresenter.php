<?PHP

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\Lesson $entity
 * @property  int $id
 * @property  int $faculty_id
 * @property  string $sub_title
 * @property  string $subsub_title
 * @property  string $lesson_title
 * @property  string $lesson_term
 * @property  string $lesson_date
 * @property  int $lesson_credit
 * @property  string $lesson_professor
 * @property  string $lesson_objectives
 * @property  string $lesson_content
 * @property  string $lesson_style
 * @property  string $lesson_evaluation
 * @property  string $lesson_textbook
 * @property  string $lesson_read
 * @property  string $lesson_officehour
 * @property  string $lesson_info
 * @property  string $evaluate_exam
 * @property  string $evaluate_report
 * @property  string $evaluate_mintest
 * @property  string $evaluate_apply
 * @property  string $evaluate_others
 * @property  string $evaluate_total
 * @property  string $url
 * @property  int $year
 * @property  \Carbon\Carbon $created_at
 * @property  \Carbon\Carbon $updated_at
 */

class LessonPresenter extends BasePresenter
{

    protected $multilingualFields = [
    ];

    protected $imageFields = [
    ];



    public function toString()
    {
        return $this->entity->present()->id;
    }


}
