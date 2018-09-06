<?PHP

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\Lesson[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\Lesson[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\Lesson[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\Lesson create($value)
 * @method \App\Models\Lesson find($id)
 * @method \App\Models\Lesson[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\Lesson[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\Lesson update($model, $input)
 * @method \App\Models\Lesson save($model);
 * @method \App\Models\Lesson firstByFilter($filter);
 * @method \App\Models\Lesson[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\Lesson[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface LessonRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\Lesson
     */
    public function getBlankModel();


}
