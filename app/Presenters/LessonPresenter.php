<?PHP

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\Lesson $entity
 * @property  int $id
 * @property  int $faculty_id
 * @property  string $sub_title
 * @property  string $subsub_title
 * @property  string $lesson_title
 * @property  string $lesson_term
 * @property  string $lesson_date
 * @property  int $lesson_credit
 * @property  string $lesson_professor
 * @property  string $lesson_objectives
 * @property  string $lesson_content
 * @property  string $lesson_style
 * @property  string $lesson_evaluation
 * @property  string $lesson_textbook
 * @property  string $lesson_read
 * @property  string $lesson_officehour
 * @property  string $lesson_info
 * @property  string $evaluate_exam
 * @property  string $evaluate_report
 * @property  string $evaluate_mintest
 * @property  string $evaluate_apply
 * @property  string $evaluate_others
 * @property  string $evaluate_total
 * @property  string $url
 * @property  int $year
 * @property  \Carbon\Carbon $created_at
 * @property  \Carbon\Carbon $updated_at
 */

class LessonPresenter extends BasePresenter
{

    protected $multilingualFields = [
    ];

    protected $imageFields = [
    ];

    public function id()
    {
        return $this->entity->id;
    }

    public function title()
    {
        return $this->entity->title;
    }

    public function sub_title()
    {
      if(isset($this->entity->sub_title)) {
        $subtitle = $this->entity->sub_title.'/'.$this->entity->subsub_title;
      }

      return $subtitle;
    }

    public function breadcrumb()
    {
        $sub_title = $this->entity->sub_title;
        $subsub_title = $this->entity->subsub_title;
        $lesson_title = $this->entity->lesson_title;

        if(!$subsub_title == ''){
            $breadcrumb = array('トップ', $sub_title, $subsub_title, $lesson_title);
        } else {
            $breadcrumb = array('トップ', $sub_title, $lesson_title);
        }


        return $breadcrumb;
    }


    public function evaluate_rate()
    {
        $evaluates = array();
        $ary = array('定期試験' => $this->entity->evaluate_exam, 'レポート' => $this->entity->evaluate_report, '小テスト' => $this->entity->evaluate_mintest, '授業への参画度' => $this->entity->evaluate_apply, 'その他' => $this->entity->evaluate_others);

        $str = '0%';
        foreach ($ary as $key => $value) {
            if($value !== $str){
                array_push($evaluates, array($key => $value));
            }
        }
        return $evaluates;
    }






    public function evaluate_rate_key()
    {
        $evaluates = array();
        $ary = array('定期試験' => $this->entity->evaluate_exam, 'レポート' => $this->entity->evaluate_report, '小テスト' => $this->entity->evaluate_mintest, '授業への参画度' => $this->entity->evaluate_apply, 'その他' => $this->entity->evaluate_others);

        foreach ($ary as $key => $value) {
            if(strpos($value,'0%') === false){
                array_push($evaluates, $key);
            }
        }
        return $evaluates;
    }


}
