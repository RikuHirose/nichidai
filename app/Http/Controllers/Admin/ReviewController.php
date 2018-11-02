<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;

use Illuminate\Http\Request;

use App\Models\Review;

class ReviewController extends Controller
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    public function __construct(
        AdminUserServiceInterface  $adminUserService,
        ReviewRepositoryInterface  $reviewRepository,
        LessonRepositoryInterface  $lessonRepository,
        UserRepositoryInterface    $userRepository
    ) {
        $this->adminUserService  = $adminUserService;
        $this->reviewRepository  = $reviewRepository;
        $this->lessonRepository  = $lessonRepository;
        $this->userRepository    = $userRepository;
    }


    public function index(Request $request)
    {
        $q = \Request::query();

        if ($this->adminUserService->isSignedIn()) {
            $reviews = $this->reviewRepository->getBlankModel()->paginate(15);
            $reviews->load('lesson', 'user');


            return view('pages.admin.reviews.index', [
                'reviews'        => $reviews,
                'searchQuery'   => false,
                'q'             => $q
            ]);
        }

        return view('pages.admin.index', []);
    }

    public function reviewedLessons(Request $request)
    {
        $q = \Request::query();

        if ($this->adminUserService->isSignedIn()) {
            $lessons = $this->lessonRepository->reviewedLesson();

            return view('pages.admin.reviews.reviewedLessons', [
                'lessons'        => $lessons,
                'searchQuery'   => false,
                'q'             => $q
            ]);
        }

        return view('pages.admin.index', []);
    }

    public function ban(Review $review)
    {
        $review->ban_flag = 1;
        $review->update();

        return response()->json(['baned' => true]);
    }

    public function unBan(Review $review)
    {

        $review->ban_flag = 0;
        $review->update();

        return response()->json(['baned' => false]);
    }


}
