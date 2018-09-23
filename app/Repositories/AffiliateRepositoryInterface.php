<?PHP

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\Affiliate[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\Affiliate[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\Affiliate[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\Affiliate create($value)
 * @method \App\Models\Affiliate find($id)
 * @method \App\Models\Affiliate[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\Affiliate[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\Affiliate update($model, $input)
 * @method \App\Models\Affiliate save($model);
 * @method \App\Models\Affiliate firstByFilter($filter);
 * @method \App\Models\Affiliate[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\Affiliate[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface AffiliateRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\Affiliate
     */
    public function getBlankModel();


}
