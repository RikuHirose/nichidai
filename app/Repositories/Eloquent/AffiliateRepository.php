<?PHP

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\AffiliateRepositoryInterface;
use App\Models\Affiliate;

class AffiliateRepository extends SingleKeyModelRepository implements AffiliateRepositoryInterface
{

    protected $querySearchTargets = [
    ];

    public function getBlankModel()
    {
        return new Affiliate();
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


    public function getAffiliates($lesson_id)
    {
        $affiliates = $this->getBlankModel()->where('lesson_id', $lesson_id)->get();

        return $affiliates;
    }

}
