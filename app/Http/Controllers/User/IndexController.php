<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\LessonRepositoryInterface;
use Illuminate\Http\Request;
use LaravelRocket\Foundation\Http\Requests\PaginationRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServiceInterface;


class IndexController extends Controller
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
        UserServiceInterface $userService
    ) {
        $this->lessonRepository         = $lessonRepository;
        $this->userService           = $userService;

    }

    

    public function index(Request $request)
    {
        $models = $this->lessonRepository->lessons();



        return view('pages.user.lessons.index', [
            'models'   => $models,
            'title'    => '新着'
        ]);
    }



}
