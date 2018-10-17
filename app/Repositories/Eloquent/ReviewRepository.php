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
        $review = $this->getBlankModel()->where('lesson_id', $lesson_id)->latest()->take(3)->get();

        return $review;
    }

    public function getReviewedLessons($user_id)
    {

        $lesson_ids  = $this->getBlankModel()::where('user_id', $user_id)->pluck('lesson_id');
        $lessons = \App\Models\Lesson::whereIn('id', $lesson_ids)->get();

        return $lessons;
    }


}
