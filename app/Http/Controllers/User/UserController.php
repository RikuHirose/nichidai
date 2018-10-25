<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use LaravelRocket\Foundation\Http\Requests\PaginationRequest;
use App\Http\Requests\SettingRequest;

use Illuminate\Support\Facades\Auth;

use App\Services\UserServiceInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;

use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;
use App\Repositories\HistoryRepositoryInterface;

use App\Models\User;


class UserController extends Controller
{

    /** @var UserServiceInterface */
    protected $userService;


    public function __construct(
        UserServiceInterface        $userService,
        UserRepositoryInterface     $userRepository,
        LessonRepositoryInterface   $lessonRepository,
        ReviewRepositoryInterface   $reviewRepository,
        FavoriteRepositoryInterface $favoriteRepository,
        HistoryRepositoryInterface  $historyRepository
    ) {
        $this->userService        = $userService;
        $this->userRepository     = $userRepository;
        $this->lessonRepository     = $lessonRepository;
        $this->reviewRepository   = $reviewRepository;
        $this->favoriteRepository = $favoriteRepository;
        $this->historyRepository  = $historyRepository;
        view()->share('authUser', $this->userService->getUser());
    }

    public function show(User $user)
    {
        $authUser       = $this->userService->getUser();
        $user_content   = $this->userRepository->user_content($user->id);

        if(isset($authUser)) {
            $sidebar_content   = $this->lessonRepository->sidebar_content_Login($authUser->id);
        } else {
            $sidebar_content   = $this->lessonRepository->sidebar_content();
        }

        return view('pages.user.user.show', [
            'searchQuery'        => true,
            'user'               => $user,
            'user_content'       => $user_content,
            'sidebar_content'    => $sidebar_content,
        ]);
    }


    public function getSetting(User $user)
    {
        return view('pages.user.user.setting', [
            'user'       => $user
        ]);
    }

    public function postSetting(SettingRequest $request, User $user)
    {
        $input = $request->only($this->userRepository->getBlankModel()->getFillable());
        // $user  = $this->userService->getUser();
        // $this->userService->setting($request->all(), $user);
        $user = $this->userRepository->update($user, $input);

        return view('pages.user.user.setting', ['success' => 'Profile updated!']);
    }

}
