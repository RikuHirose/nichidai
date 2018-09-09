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

    public function lessonsByTopSearch($q)
    {
        $lpname          = $q['lpname'];
        $lesson_content  = $q['lesson_content'];
        $year            = $q['year'];
        $lesson_term     = $q['lesson_term'];
        $lesson_date     = $q['lesson_date'];
        $lesson_hour     = $q['lesson_hour'];
        $evaluate_exam   = $q['evaluate_exam'];
        $evaluate_report = $q['evaluate_report'];


        $models = $this->getBlankModel()
        ->when($lpname, function ($query) use ($lpname) {
            return $query->where('lesson_professor', 'like', "%{$lpname}%")
                    ->orwhere('lesson_title', 'like', "%{$lpname}%");
        })
        ->when($lesson_content, function ($query) use ($lesson_content) {
            return $query->where('lesson_content', 'like', "%{$lesson_content}%");
        })
        ->when($year, function ($query) use ($year) {
            return $query->where('year', 'like', "%{$year}%");
        })
        ->when($lesson_term, function ($query) use ($lesson_term) {
            return $query->where('lesson_term', 'like', "%{$lesson_term}%");
        })
        ->when($lesson_date, function ($query) use ($lesson_date) {
            return $query->where('lesson_date', 'like', "%{$lesson_date}%");
        })
         ->when($lesson_hour, function ($query) use ($lesson_hour) {
            return $query->where('lesson_date', 'like', "%{$lesson_hour}%");
        })
        ->when($evaluate_exam, function ($query) use ($evaluate_exam) {
            return $query->where('evaluate_exam', '<' , $evaluate_exam);
        })
        ->when($evaluate_report, function ($query) use ($evaluate_report) {
            return $query->where('evaluate_report', '<', $evaluate_report);
        })
        ->get();

        

        return $models;
    }
}
