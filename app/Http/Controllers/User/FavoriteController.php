<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Repositories\LessonRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;
use App\Services\UserServiceInterface;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;


class FavoriteController extends Controller
{
    /** @var LessonRepositoryInterface */
    protected $lessonRepository;

    /** @var FavoriteRepositoryInterface */
    protected $favoriteRepository;

    /** @var UserServiceInterface */
    protected $userService;


    /**
     * JobController constructor.
     *
     * @param lessonRepositoryInterface $lessonRepository
     */
    public function __construct(
        LessonRepositoryInterface $lessonRepository,
        FavoriteRepositoryInterface $favoriteRepository,
        UserServiceInterface $userService

    ) {
        $this->lessonRepository         = $lessonRepository;
        $this->favoriteRepository       = $favoriteRepository;
        $this->userService              = $userService;
        view()->share('authUser', $this->userService->getUser());
    }


    public function postFavorite(Lesson $lesson, Request $request)
    {
      $input    = $request->only($this->favoriteRepository->getBlankModel()->getFillable());
      $authUser = $this->userService->getUser();


      if(!isset($input['lesson_id'])) {
          array_set($input, 'lesson_id', $lesson->id);
      }
      if(!isset($input['user_id'])) {
          array_set($input, 'user_id', $authUser->id);
      }


      $favorite = $this->favoriteRepository->create($input);

      if (empty($favorite)) {
          return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
      }

       return response()->json(['favorited' => true]);
    }


    public function deleteFavorite(Lesson $lesson, Request $request)
    {
      $input      = $request->only($this->favoriteRepository->getBlankModel()->getFillable());
      $authUser   = $this->userService->getUser();
      $favorited  = $this->favoriteRepository->getFavorited($lesson->id, $authUser->id);

      $favorited->delete();


      return response()->json(['favorited' => false]);

    }

}
