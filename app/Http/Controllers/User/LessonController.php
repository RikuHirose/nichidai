<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\LessonScheduleRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\AffiliateRepositoryInterface;

use App\Services\UserServiceInterface;

use Illuminate\Http\Request;
use LaravelRocket\Foundation\Http\Requests\PaginationRequest;
use App\Http\Requests\ReviewRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;


class LessonController extends Controller
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
        LessonRepositoryInterface         $lessonRepository,
        LessonScheduleRepositoryInterface $lessonScheduleRepository,
        ReviewRepositoryInterface         $reviewRepository,
        AffiliateRepositoryInterface      $affiliateRepository,
        UserServiceInterface              $userService

    ) {
        $this->lessonRepository         = $lessonRepository;
        $this->lessonScheduleRepository = $lessonScheduleRepository;
        $this->reviewRepository         = $reviewRepository;
        $this->affiliateRepository      = $affiliateRepository;
        $this->userService              = $userService;
        view()->share('authUser', $this->userService->getUser());
    }


    public function show(Lesson $lesson, Request $request)
    {
        $model = $lesson;

        $lesson_schedule = $this->lessonScheduleRepository->getRounds($model->id);
        $reviews         = $this->reviewRepository->getReviews($model->id);
        $affiliates      = $this->affiliateRepository->getAffiliatesBySort($model->id);

        return view('pages.user.lessons.show', [
            'model'            => $model,
            'lesson_schedule'  => $lesson_schedule,
            'reviews'          => $reviews,
            'affiliates'       => $affiliates
        ]);
    }


    // review

    public function getReview(Lesson $lesson)
    {
        return view('pages.user.lessons.review', [
            'model'   => $lesson
        ]);
    }

    public function postReview(Lesson $lesson, ReviewRequest $request)
    {

        $input    = $request->only($this->reviewRepository->getBlankModel()->getFillable());
        $authUser = $this->userService->getUser();

        if(!isset($input['user_id'])) {
            array_set($input, 'user_id', $authUser->id);
        }

        $review = $this->reviewRepository->create($input);

        if (empty($review)) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return view('pages.user.lessons.review', [
            'model'   => $lesson,
            'success' => 'レビューを投稿しました'
        ]);
    }

}
