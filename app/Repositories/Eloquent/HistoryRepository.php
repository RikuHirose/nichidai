<?PHP

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\HistoryRepositoryInterface;
use App\Models\History;

class HistoryRepository extends SingleKeyModelRepository implements HistoryRepositoryInterface
{

    protected $querySearchTargets = [
    ];

    public function getBlankModel()
    {
        return new History();
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

    public function getHistoryLessons($user_id)
    {
        $lesson_ids  = $this->getBlankModel()::where('user_id', $user_id)->pluck('lesson_id')->toArray();
        $lesson_ids  = array_reverse($lesson_ids);

        $ids_order   = implode(',', $lesson_ids);

        $lessons     = \App\Models\Lesson::whereIn('id', $lesson_ids)->orderByRaw("FIELD(id, $ids_order)")->get();

        return $lessons;
    }

}
