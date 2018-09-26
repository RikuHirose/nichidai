<?php
namespace App\Http\Controllers\Api\V1;

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

      dd(111);
      if(!isset($input['user_id'])) {
          array_set($input, 'user_id', $authUser->id);
      }

      $favorite = $this->favoriteRepository->create($input);

      if (empty($favorite)) {
          return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
      }


      // return $likes_count;
       return response()->json(['favorited' => true]);
    }

    public function delete(Request $request)
    {
      $content = Content::findOrFail($request->contentid);
      $content->like_by($request->userid)->findOrFail($request->likeid)->delete();

      $likes_count = $content['likes_count'];

      return $likes_count;

    }

}
