<?PHP

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\LessonRepositoryInterface;
use App\Models\Lesson;
use App\Models\OtherArticle;


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


    public function lessonsRandom()
    {
        $models = $this->getBlankModel()->inRandomOrder()->paginate(15);

        return $models;
    }

    public function lessonsBySearch($q)
    {
        $models = $this->getBlankModel()
        ->where('lesson_professor', 'like', "%{$q}%")
        ->orwhere('sub_title', 'like', "%{$q}%")
        ->orwhere('subsub_title', 'like', "%{$q}%")
        ->orwhere('lesson_title', 'like', "%{$q}%")
        ->inRandomOrder()
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

        $models = $models->inRandomOrder()->paginate(15);

        return $models;
    }

    public function lessonsByTopSearchAdmin($q)
    {
        $models = $this->getBlankModel();


        if(isset($q['id'])) {
            $id  = $q['id'];

            $models = $models->when($id, function ($query) use ($id) {
                return $query->where('id', '>=', $id);
            });
        }

        if(isset($q['isText'])) {
            $isText  = $q['isText'];

            $models = $models->when($isText, function ($query) use ($isText) {
                if($isText == 1) {
                    return $query->where('lesson_read', '!=', '')->where('lesson_textbook', '!=', '');
                }
            });
        }

        if(isset($q['popular_id'])) {
            $popular_id  = $q['popular_id'];

            $models = $models->when($popular_id, function ($query) use ($popular_id) {
                if($popular_id == 1) {
                    return $query->where('popular_id', $popular_id);
                }
            });
        }

        if(isset($q['recommend_id'])) {
            $recommend_id  = $q['recommend_id'];

            $models = $models->when($recommend_id, function ($query) use ($recommend_id) {
                if($recommend_id == 1) {
                    return $query->where('recommend_id', $recommend_id);
                }
            });
        }

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

    public function recommended_lessons()
    {
        $models = $this->getBlankModel()->where('recommend_id', 1)->orderBy('recommend_rank', 'asc')->get();

        return $models;
    }

    public function popular_lessons()
    {
        $models = $this->getBlankModel()->where('popular_id', 1)->orderBy('popular_rank', 'asc')->get();

        return $models;
    }

    public function lessonsByIdOrder($ids)
    {
        $ids_order = implode(',', $ids);
        $lessons = Lesson::whereIn('id', $ids)->orderByRaw("FIELD(id, $ids_order)")->get();

        return $lessons;
    }

    public function getHistoryLessons($user_id)
    {
        $lesson_ids  = \App\Models\History::where('user_id', $user_id)->pluck('lesson_id')->toArray();
        $lesson_ids = array_reverse($lesson_ids);

        // signup後新規userはhistryが無いため、条件分岐
        if(!empty($lesson_ids)) {
            $ids_order = implode(',', $lesson_ids);
            $lessons = $this->getBlankModel()::whereIn('id', $lesson_ids)->orderByRaw("FIELD(id, $ids_order)")->take(5)->get();

            return $lessons;
        } else {
            return null;
        }
    }

    public function getOtherArticles()
    {
        $other_articles = OtherArticle::all();

        return $other_articles;
    }


    // sidebar contentを一つの変数にまとめる
    public function sidebar_content_Login($user_id)
    {
        $recommend_lessons = self::recommended_lessons();
        $popular_lessons   = self::popular_lessons();
        $history_lessons   = self::getHistoryLessons($user_id);
        $other_articles    = self::getOtherArticles();

        $model = array();
        $model = [
            'other_articles'    => $other_articles,
            'popular_lessons'   => $popular_lessons,
            // 'recommend_lessons' => $recommend_lessons,
            // 'history_lessons'   => $history_lessons,
        ];

        return $model;
    }

    public function sidebar_content()
    {
        $recommend_lessons = self::recommended_lessons();
        $popular_lessons   = self::popular_lessons();
        $other_articles    = self::getOtherArticles();

        $model = array();
        $model = [
            'other_articles'    => $other_articles,
            'popular_lessons'   => $popular_lessons,
            // 'recommend_lessons' => $recommend_lessons,
        ];

        return $model;
    }

     // footer contentを一つの変数にまとめる
    public function footer_content_Login($user_id)
    {
        $recommend_lessons = self::recommended_lessons();
        $popular_lessons   = self::popular_lessons();
        $history_lessons   = self::getHistoryLessons($user_id);
        $other_articles    = self::getOtherArticles();

        $model = array();
        $model = [
            // 'other_articles'    => $other_articles,
            // 'popular_lessons'   => $popular_lessons,
            'recommend_lessons' => $recommend_lessons,
            'history_lessons'   => $history_lessons,
        ];

        return $model;
    }

    public function footer_content()
    {
        $recommend_lessons = self::recommended_lessons();
        $popular_lessons   = self::popular_lessons();
        $other_articles    = self::getOtherArticles();

        $model = array();
        $model = [
            // 'other_articles'    => $other_articles,
            // 'popular_lessons'   => $popular_lessons,
            'recommend_lessons' => $recommend_lessons,
        ];

        return $model;
    }


    public function group_by_subtitle()
    {
        // get subtitle list
        $subtitles = $this->getBlankModel()->where('year', 2018)->pluck('id', 'sub_title');
        $subsubtitles = $this->getBlankModel()->where('year', 2018)->pluck('id', 'subsub_title');
        // $subtitles = $this->getBlankModel()->pluck('sub_title', 'id');

        // group by subtitle
        $lessons = [];
        foreach ($subtitles as $key => $value) {

            foreach ($subsubtitles as $k => $v) {
                $lessons[$key][$k] = [];
                $lessonBySubtitle = $this->getBlankModel()->where('sub_title', $key)->where('subsub_title', $k)->where('year', 2018)->get();

                if(empty($lessonBySubtitle[1])) {
                    continue;
                } else {
                    array_push($lessons[$key][$k], $lessonBySubtitle);
                }
            }

        }

        return $lessons;

    }

}
