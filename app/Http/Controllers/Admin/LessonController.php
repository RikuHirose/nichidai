<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\LessonScheduleRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    public function __construct(
        AdminUserServiceInterface $adminUserService,
        LessonRepositoryInterface $lessonRepository,
        LessonScheduleRepositoryInterface $lessonScheduleRepository,
        ReviewRepositoryInterface $reviewRepository
    ) {
        $this->adminUserService         = $adminUserService;
        $this->lessonRepository         = $lessonRepository;
        $this->lessonScheduleRepository = $lessonScheduleRepository;
        $this->reviewRepository         = $reviewRepository;
    }

    public function edit(Lesson $lesson, Request $request)
    {
        $model = $lesson;

        $lesson_schedule = $this->lessonScheduleRepository->getRounds($model->id);

        $reviews = $this->reviewRepository->getReviews($model->id);

        return view('pages.admin.lessons.edit', [
            'model'            => $model,
            'lesson_schedule'  => $lesson_schedule,
            'reviews'          => $reviews
        ]);
    }

    public function store(Lesson $lesson, Request $request)
    {
        $input = $request->only($this->lessonRepository->getBlankModel()->getFillable());
        dd($input);
        die;
        // $authUser = $this->userService->getUser();

        // if(!isset($input['user_id'])) {
        //     array_set($input, 'user_id', $authUser->id);
        // }

        $review = $this->reviewRepository->store($input);

        // if (empty($review)) {
        //     return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        // }

        $lesson_schedule = $this->lessonScheduleRepository->getRounds($model->id);

        $reviews = $this->reviewRepository->getReviews($model->id);

        return view('pages.admin.lessons.edit', [
            'model'            => $model,
            'lesson_schedule'  => $lesson_schedule,
            'reviews'          => $reviews
        ]);
    }
}
