<?php

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\FavoriteRepositoryInterface;
use App\Models\Favorite;

class FavoriteRepository extends SingleKeyModelRepository implements FavoriteRepositoryInterface
{

    protected $querySearchTargets = [
    ];

    public function getBlankModel()
    {
        return new Favorite();
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

    public function getFavorited($lesson_id, $user_id)
    {
        $favorited = $this->getBlankModel()->where('lesson_id', $lesson_id)->where('user_id', $user_id)->first();

        return $favorited;
    }

    public function getFavoritedLessons($user_id)
    {
        $lesson_ids  = $this->getBlankModel()::where('user_id', $user_id)->pluck('lesson_id');
        $lessons = \App\Models\Lesson::whereIn('id', $lesson_ids)->get();

        return $lessons;
    }


}
