<?PHP

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\Favorite[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\Favorite[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\Favorite[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\Favorite create($value)
 * @method \App\Models\Favorite find($id)
 * @method \App\Models\Favorite[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\Favorite[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\Favorite update($model, $input)
 * @method \App\Models\Favorite save($model);
 * @method \App\Models\Favorite firstByFilter($filter);
 * @method \App\Models\Favorite[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\Favorite[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface FavoriteRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\Favorite
     */
    public function getBlankModel();


}
