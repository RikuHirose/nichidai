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

        $lesson_title      = $q['lesson_title'];
        $lesson_professor  = $q['lesson_professor'];
        $year              = $q['year'];
        $lesson_term       = $q['lesson_term'];
        $lesson_date       = $q['lesson_date'];
        $lesson_hour       = $q['lesson_hour'];
        $evaluate_exam     = $q['evaluate_exam'];
        $evaluate_report   = $q['evaluate_report'];
        $lesson_content    = $q['lesson_content'];


        $models = $this->getBlankModel()
        ->when($lesson_title, function ($query) use ($lesson_title) {
            return $query->where('lesson_title', 'like', "%{$lesson_title}%");
        })
        ->when($lesson_professor, function ($query) use ($lesson_professor) {
            return $query->where('lesson_professor', 'like', "%{$lesson_professor}%");
        })
        ->when($lesson_content, function ($query) use ($lesson_content) {
            return $query->where('lesson_content', 'like', "%{$lesson_content}%");
        })
        ->when($year, function ($query) use ($year) {
            return $query->where('year', $year);
        })
        ->when($lesson_term, function ($query) use ($lesson_term) {
            return $query->where('lesson_term', $lesson_term);
        })
        ->when($lesson_date, function ($query) use ($lesson_date) {
            return $query->where('lesson_date', $lesson_date);
        })
         ->when($lesson_hour, function ($query) use ($lesson_hour) {
            return $query->where('lesson_hour', $lesson_hour);
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
