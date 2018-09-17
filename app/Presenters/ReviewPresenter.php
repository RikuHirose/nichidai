<?PHP

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\Review $entity
 * @property  int $id
 * @property  int $lesson_id
 * @property  int $user_id
 * @property  string $review_content
 * @property  \Carbon\Carbon $created_at
 * @property  \Carbon\Carbon $updated_at
 */

class ReviewPresenter extends BasePresenter
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
    public function user()
    {
        $model = $this->entity->user;
        if (!$model) {
            $model      = new \App\Models\User();
        }
        return $model;
    }


    public function toString()
    {
        return $this->entity->present()->id;
    }


}
