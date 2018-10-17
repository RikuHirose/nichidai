<?php
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;

class UserRepository extends SingleKeyModelRepository implements UserRepositoryInterface
{
    public function getBlankModel()
    {
        return new User();
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
        if (array_key_exists('query', $filter)) {
            $searchWord = array_get($filter, 'query');
            if (!empty($searchWord)) {
                $query = $query->where(function ($q) use ($searchWord) {
                    $q->where('name', 'LIKE', '%'.$searchWord.'%');
                });
                unset($filter['query']);
            }
        }

        return parent::buildQueryByFilter($query, $filter);
    }


    public function users()
    {
        $users = $this->getBlankModel()->paginate(15);

        return $users;
    }


    public function usersByTopSearchAdmin($q)
    {
        $models = $this->getBlankModel();

        if(isset($q['id'])) {
            $id  = $q['id'];

            $models = $models->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            });
        }

        $models = $models->paginate(15);

        return $models;
    }

    public function getReviewedLessons($user_id)
    {

        $lesson_ids  = \App\Models\Review::where('user_id', $user_id)->pluck('lesson_id');
        $lessons = \App\Models\Lesson::whereIn('id', $lesson_ids)->get();

        return $lessons;
    }

    public function getFavoritedLessons($user_id)
    {
        $lesson_ids  = \App\Models\Favorite::where('user_id', $user_id)->pluck('lesson_id');
        $lessons = \App\Models\Lesson::whereIn('id', $lesson_ids)->get();

        return $lessons;
    }

    public function getHistoryLessons($user_id)
    {
        $lesson_ids  = \App\Models\History::where('user_id', $user_id)->pluck('lesson_id')->toArray();
        $lesson_ids  = array_reverse($lesson_ids);

        $ids_order   = implode(',', $lesson_ids);

        if(empty($ids_order)) {
            return null;
        } else {
            $lessons = \App\Models\Lesson::whereIn('id', $lesson_ids)->orderByRaw("FIELD(id, $ids_order)")->get();

            return $lessons;
        }

    }

    public function user_content($user_id){

        $reviewed_lessons  = self::getReviewedLessons($user_id);
        $favorited_lessons = self::getFavoritedLessons($user_id);
        $history_lessons   = self::getHistoryLessons($user_id);


        $model = array();
        $model = [
            'reviewed_lessons'  => $reviewed_lessons,
            'favorited_lessons' => $favorited_lessons,
            'history_lessons'   => $history_lessons,
        ];

        return $model;
    }

    public function user_content_nohistory($userID){}
}
