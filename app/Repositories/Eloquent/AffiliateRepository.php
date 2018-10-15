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

    public function getAffiliatesBySort($lesson_id)
    {
        $a = [
            'getTexts' => [],
            'getReads' => []
        ];

        $affiliates = $this->getBlankModel()->where('lesson_id', $lesson_id)->get();

        foreach ($affiliates as $affiliate) {
            if($affiliate->lesson_textbook_id == 1 && $affiliate->lesson_read_id == 0){
                array_push($a['getTexts'], $affiliate);

            } else if($affiliate->lesson_textbook_id == 0 && $affiliate->lesson_read_id == 1) {
                array_push($a['getReads'], $affiliate);
            }
        }

        return $a;
    }

}
