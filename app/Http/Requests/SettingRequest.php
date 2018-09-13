<?php
namespace App\Http\Requests;

class SettingRequest extends Request
{
    /*
     * Redirect action when validate fail
     * */
    protected $redirectAction = 'User\AuthController@postSetting';

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
            'name'    => 'string|nullable',
            'email'    => 'required|email|',
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
