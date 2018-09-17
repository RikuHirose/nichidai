<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelRocket\Foundation\Http\Requests\PaginationRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServiceInterface;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\SettingRequest;

class UserController extends Controller
{

    /** @var UserServiceInterface */
    protected $userService;


    public function __construct(
        UserServiceInterface $userService,
        UserRepositoryInterface $userRepository
    ) {
        $this->userService           = $userService;
         $this->userRepository     = $userRepository;
        view()->share('authUser', $this->userService->getUser());
    }

    public function index()
    {

        $authUser = $this->userService->getUser();
        return view('pages.user.user.index', [
            'searchQuery' => true
        ]);
    }


    public function getSetting()
    {
        return view('pages.user.user.setting', [
        ]);
    }

    public function postSetting(SettingRequest $request)
    {
        $user = $this->userService->getUser();
        $this->userService->setting($request->all(), $user);

        return view('pages.user.user.setting', ['success' => 'Profile updated!']);
    }

}
