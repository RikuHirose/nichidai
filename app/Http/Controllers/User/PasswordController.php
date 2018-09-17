<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\PasswordController as PasswordControllerBase;
use App\Services\UserServiceInterface;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;

class PasswordController extends PasswordControllerBase
{
    /** @var string $emailSetPageView */
    protected $emailSetPageView = 'pages.user.auth.forgot-password';

    /** @var string $passwordResetPageView */
    protected $passwordResetPageView = 'pages.user.auth.reset-password';

    /** @var string $returnAction */
    protected $returnAction = 'User\IndexController@index';

    public function __construct(UserServiceInterface $userService)
    {
        parent::__construct($userService);
    }


    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getForgotPassword()
    {
        return view($this->emailSetPageView, [
        ]);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param \App\Http\Requests\ForgotPasswordRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postForgotPassword(ForgotPasswordRequest $request)
    {
        $email = $request->get('email');

        $this->authenticatableService->sendPasswordResetEmail($email);

        return redirect()->back()->with('status', 'success');
    }


       /**
     * Display the password reset view for the given token.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\Response
     */
    public function getResetPassword($token = null)
    {
        if (empty($token)) {
            abort(404);
        }

        return view($this->passwordResetPageView, [
            'token' => $token,
        ]);
    }

    /**
     * Reset the given user's password.
     *
     * @param \App\Http\Requests\ResetPasswordRequest $request
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function postResetPassword(ResetPasswordRequest $request)
    {
        $email    = $request->get('email');
        $token    = $request->get('token');
        $password = $request->get('password');
        if ($password == $request->get('password_confirmation')) {
            if ($this->authenticatableService->resetPassword($email, $password, $token)) {
                return \Redirect::action($this->returnAction);
            }
        }

        return redirect()->back()->withInput($request->only('email'));
    }
}
