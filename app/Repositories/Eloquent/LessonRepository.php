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
        $models = $this->getBlankModel()->paginate(15);

        return $models;
    }

    public function lessonsBySearch($q)
    {
        $models = $this->getBlankModel()
        ->where('lesson_professor', 'like', "%{$q}%")
        ->orwhere('sub_title', 'like', "%{$q}%")
        ->orwhere('subsub_title', 'like', "%{$q}%")
        ->orwhere('lesson_title', 'like', "%{$q}%")
        ->paginate(15);

        return $models;
    }

    public function lessonsByTopSearch($q)
    {
        $models = $this->getBlankModel();


        if(isset($q['lesson_title'])) {
            $lesson_title  = $q['lesson_title'];

            $models = $models->when($lesson_title, function ($query) use ($lesson_title) {
                return $query->where('lesson_title', 'like', "%{$lesson_title}%");
            });
        }

        if(isset($q['lesson_professor'])) {
            $lesson_professor  = $q['lesson_professor'];
            $models = $models->when($lesson_professor, function ($query) use ($lesson_professor) {
                return $query->where('lesson_professor', 'like', "%{$lesson_professor}%");
            });
        }

        if(isset($q['year'])) {
            $year              = $q['year'];
            $models = $models->when($year, function ($query) use ($year) {
                return $query->where('year', $year);
            });
        }

        if(isset($q['lesson_term'])) {
            $lesson_term       = $q['lesson_term'];
            $models = $models->when($lesson_term, function ($query) use ($lesson_term) {
                return $query->where('lesson_term', $lesson_term);
            });
        }

        if(isset($q['lesson_date'])) {
            $lesson_date       = $q['lesson_date'];
            $models = $models->when($lesson_date, function ($query) use ($lesson_date) {
                return $query->where('lesson_date', $lesson_date);
            });
        }

        if(isset($q['lesson_hour'])) {
            $lesson_hour       = $q['lesson_hour'];
            $models = $models->when($lesson_hour, function ($query) use ($lesson_hour) {
                return $query->where('lesson_hour', $lesson_hour);
            });
        }

        if(isset($q['evaluate_exam'])) {
            $evaluate_exam     = $q['evaluate_exam'];
            $models = $models->when($evaluate_exam, function ($query) use ($evaluate_exam) {
                return $query->where('evaluate_exam', '<' , $evaluate_exam);
            });
        }

        if(isset($q['evaluate_report'])) {
            $evaluate_report   = $q['evaluate_report'];
            $models = $models->when($evaluate_report, function ($query) use ($evaluate_report) {
                return $query->where('evaluate_report', '<', $evaluate_report);
            });
        }

        if(isset($q['lesson_content'])) {
            $lesson_content       = $q['lesson_content'];
            $models = $models->when($lesson_content, function ($query) use ($lesson_content) {
                return $query->where('lesson_content', 'like', "%{$lesson_content}%");
            });
        }

        $models = $models->paginate(15);

        return $models;
    }

    public function show($id)
    {
        $model = $this->getBlankModel()->where('id', $id)->get();

        return $model;
    }
}
