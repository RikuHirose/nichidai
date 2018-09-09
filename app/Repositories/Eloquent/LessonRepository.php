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
        $models = $this->getBlankModel()->limit(132)->get();

        return $models;
    }

    public function lessonsBySearch($q)
    {
        $models = $this->getBlankModel()->where('lesson_professor', 'like', "%{$q}%")->orwhere('sub_title', 'like', "%{$q}%")->orwhere('subsub_title', 'like', "%{$q}%")->get();

        return $models;
    }
}
