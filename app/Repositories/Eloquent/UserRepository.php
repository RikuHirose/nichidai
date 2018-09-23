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
}
