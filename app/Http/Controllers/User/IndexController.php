<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\LessonRepositoryInterface;
use App\Services\UserServiceInterface;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use LaravelRocket\Foundation\Http\Requests\PaginationRequest;

use Illuminate\Support\Facades\Auth;

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
        UserServiceInterface      $userService
    ) {
        $this->lessonRepository      = $lessonRepository;
        $this->userService           = $userService;
        view()->share('authUser', $this->userService->getUser());
    }


    public function index(Request $request)
    {
        if(\App\Helpers\Production\IsMobileHelper::isMobile() == false) {

            $q        = \Request::query();
            $authUser = $this->userService->getUser();

            if(isset($authUser)) {
                $sidebar_content   = $this->lessonRepository->sidebar_content_Login($authUser->id);
            } else {
                $sidebar_content   = $this->lessonRepository->sidebar_content();
            }

            if(isset($q['q'])) {
                $q['q'] = htmlspecialchars($q['q'], ENT_QUOTES, "UTF-8" );
                $models = $this->lessonRepository->lessonsBySearch($q['q']);

                // // set SEO information
                // $title = trans('job.JobIndexRec.title');
                // \SeoHelper::setJobIndexSeo($title);

                return view('pages.user.lessons.index', [
                    'models'            => $models,
                    'title'             => '「'.$q['q'].'」の検索結果',
                    'breadcrumb'        => '「'.$q['q'].'」の検索結果',
                    'searchQuery'       => true,
                    'q'                 => $q,
                    'sidebar_content'   => $sidebar_content
                ]);

            } else {

                $models = $this->lessonRepository->lessonsRandom();

                return view('pages.user.lessons.index', [
                    'models'            => $models,
                    'title'             => '新着レビュー',
                    'searchQuery'       => false,
                    'q'                 => $q,
                    'sidebar_content'   => $sidebar_content
                ]);
            }
        } else {
            // mobile

            $q        = \Request::query();
            $authUser = $this->userService->getUser();

            if(isset($authUser)) {
                $sidebar_content   = $this->lessonRepository->sidebar_content_Login($authUser->id);
            } else {
                $sidebar_content   = $this->lessonRepository->sidebar_content();
            }

            if(isset($q['q'])) {
                $q['q'] = htmlspecialchars($q['q'], ENT_QUOTES, "UTF-8" );
                $models = $this->lessonRepository->mobileLessonsBySearch($q['q']);
                $total = $this->lessonRepository->lessonsBySearch($q['q']);

                // // set SEO information
                // $title = trans('job.JobIndexRec.title');
                // \SeoHelper::setJobIndexSeo($title);

                return view('pages.user.lessons.mobile.index', [
                    'models'            => $models,
                    'title'             => '「'.$q['q'].'」の検索結果',
                    'breadcrumb'        => '「'.$q['q'].'」の検索結果',
                    'searchQuery'       => true,
                    'q'                 => $q,
                    'sidebar_content'   => $sidebar_content,
                    'totalCount'        => $total->total()
                ]);

            } else {

                $models = $this->lessonRepository->mobileLessonsRandom();

                return view('pages.user.lessons.mobile.index', [
                    'models'            => $models,
                    'title'             => '新着レビュー',
                    'searchQuery'       => false,
                    'q'                 => $q,
                    'sidebar_content'   => $sidebar_content
                ]);
            }
        }

    }

    public function searchIndex(SearchRequest $request)
    {
        if(\App\Helpers\Production\IsMobileHelper::isMobile() == false) {

            // $q = \Request::query();
            $q                 = $request->only($this->lessonRepository->getBlankModel()->getFillable());
            $sidebar_content   = $this->lessonRepository->sidebar_content();


            if(isset($q)) {
                foreach($q as $key => $value) {
                  $q[$key] = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
                }
                $models = $this->lessonRepository->lessonsByTopSearch($q);


                $search_result = '';
                foreach ($q as $key => $value) {
                    if($value != null) {

                        switch ($key){
                            case 'lesson_date':
                              $search_result .= '-'.$value.'曜日';
                              break;
                            case 'lesson_hour':
                              $search_result .= '-'.$value.'時限';
                              break;
                            case 'evaluate_exam':
                              $search_result .= '-'.'定期試験の割合'.$value.'%';
                              break;
                            case 'evaluate_report':
                              $search_result .= '-'.'レポートの割合'.$value.'%';
                              break;
                            case 'year':
                              $search_result .= '-'.$value.'年度';
                              break;
                            case 'lesson_term':
                              continue;
                            default:
                              $search_result .= '-'.$value;
                        }

                        if($value == '前期' || $value == '後期') {
                            $search_result .= '-'.$value.'のみ';
                        } elseif($value == '通年') {
                            $search_result .= '-'.$value;
                        }

                    }
                }
                $search_result = $search_result.'-';

                // // set SEO information
                // $title = trans('job.JobIndexRec.title');
                // \SeoHelper::setJobIndexSeo($title);

            }

            return view('pages.user.lessons.index', [
                'models'              => $models,
                'title'               => '「'.$search_result.'」の検索結果',
                'searchQuery'         => true,
                'q'                   => $q,
                'sidebar_content'     => $sidebar_content
            ]);
        } else {

            // $q = \Request::query();
            $q                 = $request->only($this->lessonRepository->getBlankModel()->getFillable());
            $sidebar_content   = $this->lessonRepository->sidebar_content();

            if(isset($q)) {
                foreach($q as $key => $value) {
                  $q[$key] = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
                }
                $models = $this->lessonRepository->mobileLessonsByTopSearch($q);
                $total = $this->lessonRepository->lessonsByTopSearch($q);

                $search_result = '';
                foreach ($q as $key => $value) {
                    if($value != null) {

                        switch ($key){
                            case 'lesson_date':
                              $search_result .= '-'.$value.'曜日';
                              break;
                            case 'lesson_hour':
                              $search_result .= '-'.$value.'時限';
                              break;
                            case 'evaluate_exam':
                              $search_result .= '-'.'定期試験の割合'.$value.'%';
                              break;
                            case 'evaluate_report':
                              $search_result .= '-'.'レポートの割合'.$value.'%';
                              break;
                            case 'year':
                              $search_result .= '-'.$value.'年度';
                              break;
                            case 'lesson_term':
                              continue;
                            default:
                              $search_result .= '-'.$value;
                        }

                        if($value == '前期' || $value == '後期') {
                            $search_result .= '-'.$value.'のみ';
                        } elseif($value == '通年') {
                            $search_result .= '-'.$value;
                        }

                    }
                }
                $search_result = $search_result.'-';

                // // set SEO information
                // $title = trans('job.JobIndexRec.title');
                // \SeoHelper::setJobIndexSeo($title);
            }

            return view('pages.user.lessons.mobile.index', [
                'models'              => $models,
                'title'               => '「'.$search_result.'」の検索結果',
                'searchQuery'         => true,
                'q'                   => $q,
                'sidebar_content'     => $sidebar_content,
                'totalCount'          => $total->total()
            ]);
        }
    }



}
