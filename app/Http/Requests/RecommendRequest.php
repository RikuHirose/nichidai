<?php
namespace App\Http\Requests;

class RecommendRequest extends Request
{
    /*
     * Redirect action when validate fail
     * */
    protected $redirectAction = 'Admin\SideController@getRecommend';

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
            'recommend_rank'    => 'required|integer',
            'id'                => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => trans('validation.required'),
            'email.email'       => trans('validation.email'),

        ];
    }
}
