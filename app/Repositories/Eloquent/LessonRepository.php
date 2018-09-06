<?PHP

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\LessonRepositoryInterface;
use App\Models\Lesson;

class LessonRepository extends SingleKeyModelRepository implements LessonRepositoryInterface
{

    protected $querySearchTargets = [
    ];

    public function getBlankModel()
    {
        return new Lesson();
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


    public function lessons()
    {
        $models = $this->getBlankModel()->limit(3)->get();

        return $models;
    }
}
