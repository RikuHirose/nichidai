<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\LessonScheduleRepositoryInterface;
use Illuminate\Http\Request;
use LaravelRocket\Foundation\Http\Requests\PaginationRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServiceInterface;
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
        LessonRepositoryInterface $lessonRepository,
        LessonScheduleRepositoryInterface $lessonScheduleRepository,
        UserServiceInterface $userService

    ) {
        $this->lessonRepository         = $lessonRepository;
        $this->lessonScheduleRepository = $lessonScheduleRepository;
        $this->userService              = $userService;

    }


    public function show(Lesson $lesson, Request $request)
    {
        $model = $lesson;
        $lesson_schedule = $this->lessonScheduleRepository->getRounds($model->id);


        return view('pages.user.lessons.show', [
            'model'            => $model,
            'lesson_schedule'  => $lesson_schedule
        ]);
    }

}
