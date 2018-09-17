<?PHP

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\ReviewRepositoryInterface;
use App\Models\Review;

class ReviewRepository extends SingleKeyModelRepository implements ReviewRepositoryInterface
{

    protected $querySearchTargets = [
    ];

    public function getBlankModel()
    {
        return new Review();
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

    public function getReviews($lesson_id)
    {
        $review = $this->getBlankModel()->where('lesson_id', $lesson_id)->get();

        return $review;
    }


}
