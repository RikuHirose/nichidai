<?php
namespace App\Http\Requests;

class ContactRequest extends Request
{
    /*
     * Redirect action when validate fail
     * */
    protected $redirectAction = 'User\ContactController@getContact';

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
            'name'    => 'bail|required|max:255',
            'email'   => 'required|max:255',
            'subject' => 'nullable|max:255',
            'message' => 'required|max:255',
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
