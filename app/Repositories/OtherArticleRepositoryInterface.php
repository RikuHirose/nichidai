<?PHP

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\OtherArticle[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\OtherArticle[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\OtherArticle[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\OtherArticle create($value)
 * @method \App\Models\OtherArticle find($id)
 * @method \App\Models\OtherArticle[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\OtherArticle[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\OtherArticle update($model, $input)
 * @method \App\Models\OtherArticle save($model);
 * @method \App\Models\OtherArticle firstByFilter($filter);
 * @method \App\Models\OtherArticle[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\OtherArticle[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface OtherArticleRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\OtherArticle
     */
    public function getBlankModel();


}
