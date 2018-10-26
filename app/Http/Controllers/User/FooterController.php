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

class FooterController extends Controller
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


    public function getTerm()
    {
        return view('pages.user.footer.term', [

        ]);
    }


    public function getPrivacy()
    {
        return view('pages.user.footer.privacy', [

        ]);
    }
}
