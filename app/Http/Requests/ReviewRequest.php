<?php
namespace App\Http\Requests;

class ReviewRequest extends Request
{
    /*
     * Redirect action when validate fail
     * */
    protected function getRedirectUrl()
    {
       $url = $this->redirector->getUrlGenerator();

       $lesson = $this->route()->parameter('lesson');

       return $url->route('lesson.review.get', $lesson);
    }

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
            'review_content'    => 'string|required|min: 5',
            'privacy_check'     => '|accepted'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
