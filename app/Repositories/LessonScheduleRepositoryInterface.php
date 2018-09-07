<?PHP

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\LessonSchedule[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\LessonSchedule[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\LessonSchedule[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\LessonSchedule create($value)
 * @method \App\Models\LessonSchedule find($id)
 * @method \App\Models\LessonSchedule[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\LessonSchedule[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\LessonSchedule update($model, $input)
 * @method \App\Models\LessonSchedule save($model);
 * @method \App\Models\LessonSchedule firstByFilter($filter);
 * @method \App\Models\LessonSchedule[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\LessonSchedule[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface LessonScheduleRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\LessonSchedule
     */
    public function getBlankModel();


}
