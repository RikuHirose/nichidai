<?PHP

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\LessonSchedule $entity
 * @property  int $id
 * @property  int $lesson_id
 * @property  string $lesson_title
 * @property  string $lesson_round
 * @property  string $lesson_round_title
 * @property  \Carbon\Carbon $created_at
 * @property  \Carbon\Carbon $updated_at
 */

class LessonSchedulePresenter extends BasePresenter
{

    protected $multilingualFields = [
    ];

    protected $imageFields = [
    ];

    public function lesson()
    {
        $model = $this->entity->lesson;
        if (!$model) {
            $model      = new \App\Models\Lesson();
        }
        return $model;
    }


    public function toString()
    {
        return $this->entity->present()->id;
    }


}
