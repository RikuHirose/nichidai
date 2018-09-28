<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use LaravelRocket\Foundation\Http\Requests\PaginationRequest;
use App\Http\Requests\SettingRequest;

use Illuminate\Support\Facades\Auth;

use App\Services\UserServiceInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;

use App\Models\User;


class UserController extends Controller
{

    /** @var UserServiceInterface */
    protected $userService;


    public function __construct(
        UserServiceInterface        $userService,
        UserRepositoryInterface     $userRepository,
        ReviewRepositoryInterface   $reviewRepository,
        FavoriteRepositoryInterface $favoriteRepository
    ) {
        $this->userService        = $userService;
        $this->userRepository     = $userRepository;
        $this->reviewRepository   = $reviewRepository;
        $this->favoriteRepository = $favoriteRepository;
        view()->share('authUser', $this->userService->getUser());
    }

    public function show(User $user)
    {
        $authUser          = $this->userService->getUser();

        $reviewed_lessons  = $this->reviewRepository->getReviewedLessons($user->id);
        $favorited_lessons = $this->favoriteRepository->getFavoritedLessons($user->id);

        return view('pages.user.user.show', [
            'searchQuery'        => true,
            'user'               => $user,
            'reviewed_lessons'   => $reviewed_lessons,
            'favorited_lessons'  => $favorited_lessons,
        ]);
    }


    public function getSetting(User $user)
    {
        return view('pages.user.user.setting', [
            'user'       => $user
        ]);
    }

    public function postSetting(SettingRequest $request)
    {
        $user = $this->userService->getUser();
        $this->userService->setting($request->all(), $user);

        return view('pages.user.user.setting', ['success' => 'Profile updated!']);
    }

}
