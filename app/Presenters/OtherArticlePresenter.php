<?PHP

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\OtherArticle $entity
 * @property  int $id
 * @property  string $title
 * @property  string $link
 * @property  string $imgURL
 * @property  \Carbon\Carbon $created_at
 * @property  \Carbon\Carbon $updated_at
 */

class OtherArticlePresenter extends BasePresenter
{

    protected $multilingualFields = [
    ];

    protected $imageFields = [
    ];



    public function toString()
    {
        return $this->entity->present()->title;
    }


}
