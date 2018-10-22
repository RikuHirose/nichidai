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

        $authUser = $this->userService->getUser();

        if(isset($authUser)) {
            $sidebar_content   = $this->lessonRepository->sidebar_content_Login($authUser->id);
        } else {
            $sidebar_content   = $this->lessonRepository->sidebar_content();
        }

        if(isset($authUser)) {
            $footer_content   = $this->lessonRepository->footer_content_Login($authUser->id);
        } else {
            $footer_content   = $this->lessonRepository->footer_content();
        }

        return view('pages.user.lessons.show', [
            'model'            => $model,
            'lesson_schedule'  => $lesson_schedule,
            'reviews'          => $reviews,
            'affiliates'       => $affiliates,
            'sidebar_content'  => $sidebar_content,
            'footer_content'   => $footer_content
        ]);
    }


    // review

    public function getReview(Lesson $lesson)
    {
        $reviews = $this->reviewRepository->getBlankModel()->where('lesson_id', $lesson->id)->latest()->get();

        return view('pages.user.lessons.review', [
            'model'   => $lesson,
            'reviews' => $reviews
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

        $reviews = $this->reviewRepository->getBlankModel()->where('lesson_id', $lesson->id)->latest()->get();

        return view('pages.user.lessons.review', [
            'model'   => $lesson,
            'success' => 'レビューを投稿しました',
            'reviews' => $reviews
        ]);
    }

    public function getLessons()
    {
        $lesson_lists = $this->lessonRepository->group_by_subtitle();


        if(isset($authUser)) {
            $sidebar_content   = $this->lessonRepository->sidebar_content_Login($authUser->id);
        } else {
            $sidebar_content   = $this->lessonRepository->sidebar_content();
        }

        return view('pages.user.footer.lessons.index', [
            'lesson_lists'    => $lesson_lists,
            'sidebar_content' => $sidebar_content
        ]);
    }

    public function searchLessons(Request $request)
    {
        $q = \Request::query();
        $lessons = $this->lessonRepository->getBlankModel()->where('lesson_title', $q['lesson_title'])->get();

        if(isset($authUser)) {
            $sidebar_content   = $this->lessonRepository->sidebar_content_Login($authUser->id);
        } else {
            $sidebar_content   = $this->lessonRepository->sidebar_content();
        }

        return view('pages.user.footer.lessons.searchLessons', [
            'lessons'    => $lessons,
            'sidebar_content' => $sidebar_content
        ]);
    }

}
