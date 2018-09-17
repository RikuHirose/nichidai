<?php
namespace App\Http\Requests;

class SearchRequest extends Request
{
    /*
     * Redirect action when validate fail
     * */
    protected $redirectAction = 'User\IndexController@searchIndex';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'lesson_title'       => 'string|max:125|nullable',
            'lesson_professor'   => 'string|max:125|nullable',
            'year'               => 'integer|nullable',
            'lesson_term'        => 'string|max:125|nullable',
            'lesson_date'        => 'string|max:125|nullable',
            'lesson_hour'        => 'integer|nullable',
            'evaluate_exam'      => 'integer|nullable',
            'evaluate_report'    => 'integer|nullable',
            'lesson_content'     => 'string|max:125|nullable',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
