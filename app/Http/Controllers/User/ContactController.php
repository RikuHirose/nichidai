<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServiceInterface;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Validator;

use App\Notifications\Slack;
use App\Services\SlackServiceInterface AS SlackPepo;

class ContactController extends Controller
{
    /** @var LessonRepositoryInterface */
    protected $lessonRepository;

    /** @var UserServiceInterface */
    protected $userService;


    /**
     * JobController constructor.
     *
     * @param lessonRepositoryInterface $lessonRepository
     */
    public function __construct(
        UserServiceInterface $userService
    ) {
        $this->userService           = $userService;
        view()->share('authUser', $this->userService->getUser());
    }

    public function getContact()
    {
        return view('pages.user.footer.contact.contact', [

        ]);
    }

    public function postContactCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'bail|required|max:255',
            'email'   => 'required|max:255',
            'subject' => 'nullable|max:255',
            'message' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/contact');
        }

        return view('pages.user.footer.contact.contactCheck', [
            'request' => $request
        ]);
    }

    public function postContactSubmit(Request $request, SlackPepo $slackHook)
    {
        // 確認画面で戻るボタンが押された場合
        if ($request->get('action') === 'back') {
            // 入力画面へ戻る
            return redirect('/contact')
                    ->withInput();
        }

        $validator = Validator::make($request->all(), [
            'name'    => 'bail|required|max:255',
            'email'   => 'required|max:255',
            'subject' => 'nullable|max:255',
            'message' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/contact')
                    ->withErrors($validator)
                    ->withInput();
        }


        //notificate slack
        $name    = $request['name'];
        $email   = $request['email'];
        $subject = $request['subject'];
        $message = $request['message'];

        $slackHook->notify(new Slack($name, $email, $subject, $message));


        return view('pages.user.footer.contact.contactComplete', [

        ]);

    }


}
