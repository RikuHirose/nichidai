<?PHP

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\OtherArticleRepositoryInterface;
use App\Models\OtherArticle;

class OtherArticleRepository extends SingleKeyModelRepository implements OtherArticleRepositoryInterface
{

    protected $querySearchTargets = [
        'title',
    ];

    public function getBlankModel()
    {
        return new OtherArticle();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

    protected function buildQueryByFilter($query, $filter)
    {

        return parent::buildQueryByFilter($query, $filter);
    }

}
