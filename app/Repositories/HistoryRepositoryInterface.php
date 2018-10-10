<?PHP

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\History[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\History[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\History[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\History create($value)
 * @method \App\Models\History find($id)
 * @method \App\Models\History[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\History[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\History update($model, $input)
 * @method \App\Models\History save($model);
 * @method \App\Models\History firstByFilter($filter);
 * @method \App\Models\History[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\History[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface HistoryRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\History
     */
    public function getBlankModel();


}
