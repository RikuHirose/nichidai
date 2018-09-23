<?PHP

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\Affiliate $entity
 * @property  int $id
 * @property  int $lesson_id
 * @property  string $lesson_textbook
 * @property  string $lesson_read
 * @property  string $amazon_a_href
 * @property  string $amazon_img_src
 * @property  string $amazon_title
 * @property  string $moshimo_img_src
 * @property  \Carbon\Carbon $created_at
 * @property  \Carbon\Carbon $updated_at
 */

class AffiliatePresenter extends BasePresenter
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
