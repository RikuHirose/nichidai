<?PHP

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\LessonScheduleRepositoryInterface;
use App\Models\LessonSchedule;

class LessonScheduleRepository extends SingleKeyModelRepository implements LessonScheduleRepositoryInterface
{

    protected $querySearchTargets = [
    ];

    public function getBlankModel()
    {
        return new LessonSchedule();
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



    public function getRounds($lesson_id)
    {
        $rounds = $this->getBlankModel()->where('lesson_id', $lesson_id)->get();

        return $rounds;
    }

}
