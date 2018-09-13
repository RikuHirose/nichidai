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

        $q = \Request::query();

        if(isset($q['q'])) {
            $q['q'] = htmlspecialchars($q['q'], ENT_QUOTES, "UTF-8" );
            $models = $this->lessonRepository->lessonsBySearch($q['q']);

            view()->share('authUser', $this->userService->getUser());

            // // set SEO information
            // $title = trans('job.JobIndexRec.title');
            // \SeoHelper::setJobIndexSeo($title);

            return view('pages.user.lessons.index', [
                'models'        => $models,
                'title'         => '「'.$q['q'].'」の検索結果',
                'breadcrumb'    => '「'.$q['q'].'」の検索結果',
                'searchQuery'   => true,
                'q'             => $q
            ]);
        } else {

            $models = $this->lessonRepository->lessons();

            return view('pages.user.lessons.index', [
                'models'        => $models,
                'title'         => '新着',
                'searchQuery'   => false
            ]);
        }

    }

    public function searchIndex(Request $request)
    {
        $q = \Request::query();

        if(isset($q)) {
            // foreach($q as $key => $value) {
            //   $q[$key] = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
            // }
            $models = $this->lessonRepository->lessonsByTopSearch($q);



            view()->share('authUser', $this->userService->getUser());

            $search_result = implode('-', $q);

            // // set SEO information
            // $title = trans('job.JobIndexRec.title');
            // \SeoHelper::setJobIndexSeo($title);

        }

        return view('pages.user.lessons.index', [
            'models'   => $models,
            'title'    => '「'.$search_result.'」の検索結果',
            'searchQuery'   => true,
            'q'  => $q
        ]);
    }



}
