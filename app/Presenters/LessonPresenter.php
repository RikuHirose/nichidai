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
 * @property  int $lesson_hour
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

    public function breadcrumbReview()
    {
        $sub_title = $this->entity->sub_title;
        $subsub_title = $this->entity->subsub_title;
        $lesson_title = $this->entity->lesson_title;
        $lesson_professor = $this->entity->lesson_professor;

        $lesson_title = $lesson_title.'('.$lesson_professor.')';

        if(!$subsub_title == ''){
            $breadcrumb = array('トップ', $sub_title, $subsub_title, $lesson_title, 'レビュー');
        } else {
            $breadcrumb = array('トップ', $sub_title, $lesson_title, 'レビュー');
        }


        return $breadcrumb;
    }


    public function evaluate_rate()
    {
        $evaluates = array();
        $ary = array('定期試験' => $this->entity->evaluate_exam, 'レポート' => $this->entity->evaluate_report, '小テスト' => $this->entity->evaluate_mintest, '授業への参画度' => $this->entity->evaluate_apply, 'その他' => $this->entity->evaluate_others);

        return $ary;
    }


    public function card_evaluate()
    {
        $evaluates = [];
        $ary = array('定期試験' => $this->entity->evaluate_exam, 'レポート' => $this->entity->evaluate_report, '小テスト' => $this->entity->evaluate_mintest, '授業への参画度' => $this->entity->evaluate_apply, 'その他' => $this->entity->evaluate_others);

        $str = 0;


        $newArray = array_filter($ary,function($k) {
                return $k;
            });


        return $newArray;
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


    public function lesson_objectives(){

        if(!$this->entity->lesson_objectives == null)
        {
            $this->entity->lesson_objectives = $this->entity->lesson_objectives;
        }
        else
        {
            $this->entity->lesson_objectives = 'ー';
        }
        return $this->entity->lesson_objectives;
    }

    public function lesson_content(){

        if(!$this->entity->lesson_content == null)
        {
            $this->entity->lesson_content = $this->entity->lesson_content;
        }
        else
        {
            $this->entity->lesson_content = 'ー';
        }
        return $this->entity->lesson_content;
    }

    public function lesson_textbook(){

        if(!$this->entity->lesson_textbook == null)
        {
            $this->entity->lesson_textbook = $this->entity->lesson_textbook;
        }
        else
        {
            $this->entity->lesson_textbook = 'ー';
        }
        return $this->entity->lesson_textbook;
    }

    public function lesson_read(){

        if(!$this->entity->lesson_read == null)
        {
            $this->entity->lesson_read = $this->entity->lesson_read;
        }
        else
        {
            $this->entity->lesson_read = 'ー';
        }
        return $this->entity->lesson_read;
    }

    public function lesson_style(){

        if(!$this->entity->lesson_style == null)
        {
            $this->entity->lesson_style = $this->entity->lesson_style;
        }
        else
        {
            $this->entity->lesson_style = 'ー';
        }
        return $this->entity->lesson_style;
    }

    public function lesson_officehour(){

        if(!$this->entity->lesson_officehour == null)
        {
            $this->entity->lesson_officehour = $this->entity->lesson_officehour;
        }
        else
        {
            $this->entity->lesson_officehour = 'ー';
        }
        return $this->entity->lesson_officehour;
    }

    public function lesson_info(){

        if(!$this->entity->lesson_info == null)
        {
            $this->entity->lesson_info = $this->entity->lesson_info;
        }
        else
        {
            $this->entity->lesson_info = 'ー';
        }
        return $this->entity->lesson_info;
    }

    public function lesson_name_admin() {
        $sub_title = $this->entity->sub_title;
        $subsub_title = $this->entity->subsub_title;
        $lesson_title = $this->entity->lesson_title;

        if(!$subsub_title == ''){
            $name = $sub_title.'/'.$subsub_title.'/'.$lesson_title;
        } else {
            $name = $sub_title.'/'.$lesson_title;
        }


        return $name;
    }

    public function lesson_date_admin() {
        $date = $this->entity->lesson_date.'/'.$this->entity->lesson_hour;

        return $date;
    }

    public function favorited($user_id) {
        $favorite = $this->entity->favorites()->where('user_id', $user_id)->first();

        return $favorite;
    }

}
