<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\OtherArticleRepositoryInterface;

use App\Models\Lesson;
use App\Models\OtherArticle;

use Illuminate\Http\Request;

class SideController extends Controller
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    public function __construct(
        AdminUserServiceInterface       $adminUserService,
        LessonRepositoryInterface       $lessonRepository,
        OtherArticleRepositoryInterface $otherArticleRepository
    ) {
        $this->lessonRepository       = $lessonRepository;
        $this->adminUserService       = $adminUserService;
        $this->otherArticleRepository = $otherArticleRepository;
    }

    public function index(Request $request)
    {
        $q = \Request::query();

        if ($this->adminUserService->isSignedIn()) {
            /** @var \App\Models\AdminUser $agent */
            $adminUser = $this->adminUserService->getUser();
            $models = $this->lessonRepository->lessons();

            return view('pages.admin.sidebar.index', [
                'models'        => $models,
                'searchQuery'   => false,
                'q'             => $q
            ]);
        }

        return view('pages.admin.sidebar.index', []);
    }

    public function getRecommend()
    {
        $recommended_lessons = $this->lessonRepository->recommended_lessons();

        return view('pages.admin.sidebar.recommend', [
            'recommended_lessons' => $recommended_lessons
        ]);
    }

    public function postRecommend(Request $request)
    {
        $lesson = \App\Models\Lesson::where('id', $request->id)->get();

        $input = $request->only($this->lessonRepository->getBlankModel()->getFillable());

        if(!isset($input['recommend_id'])) {
            array_set($input, 'recommend_id', 1);
        }

        if(!isset($input['recommend_rank'])) {
            array_set($input, 'recommend_rank', $request->recommend_rank);
        }

        $this->lessonRepository->update($lesson[0], $input);


        $recommended_lessons = $this->lessonRepository->recommended_lessons();

        return view('pages.admin.sidebar.recommend', [
            'recommended_lessons' => $recommended_lessons
        ]);
    }

    public function deleteRecommend(Request $request, Lesson $lesson)
    {
        $input = $request->only($this->lessonRepository->getBlankModel()->getFillable());

        array_set($input, 'recommend_id', 0);
        array_set($input, 'recommend_rank', null);

        $this->lessonRepository->update($lesson, $input);

        return redirect('/admin/sidebar/recommend/');
    }



    public function getPopular()
    {
        $popular_lessons = $this->lessonRepository->popular_lessons();

        return view('pages.admin.sidebar.popular', [
            'popular_lessons' => $popular_lessons
        ]);
    }

    public function postPopular(Request $request)
    {
        $lesson = \App\Models\Lesson::where('id', $request->id)->get();

        $input = $request->only($this->lessonRepository->getBlankModel()->getFillable());

        if(!isset($input['popular_id'])) {
            array_set($input, 'popular_id', 1);
        }

        if(!isset($input['popular_rank'])) {
            array_set($input, 'popular_rank', $request->popular_rank);
        }

        $this->lessonRepository->update($lesson[0], $input);


        return redirect('/admin/sidebar/popular/');
    }

    public function deletePopular(Request $request, Lesson $lesson)
    {
        $input = $request->only($this->lessonRepository->getBlankModel()->getFillable());

        array_set($input, 'popular_id', 0);
        array_set($input, 'popular_rank', null);

        $this->lessonRepository->update($lesson, $input);

        return redirect('/admin/sidebar/popular/');
    }

    public function getOtherArticle()
    {
        $other_articles = $this->otherArticleRepository->getBlankModel()->all();

        return view('pages.admin.sidebar.otherArticle', [
            'other_articles' => $other_articles
        ]);
    }

    public function postOtherArticle(Request $request)
    {

        $input = $request->only($this->otherArticleRepository->getBlankModel()->getFillable());

        if(!isset($input['title'])) {
            array_set($input, 'title', $request->title);
        }

        if(!isset($input['link'])) {
            array_set($input, 'link', $request->link);
        }

        if(!isset($input['imgURL'])) {
            array_set($input, 'imgURL', $request->imgURL);
        }


        $this->otherArticleRepository->create($input);


        return redirect('/admin/sidebar/other_article/');
    }

    public function deleteOtherArticle(Request $request, OtherArticle $otherArticle)
    {
        $this->otherArticleRepository->delete($otherArticle);

        return redirect('/admin/sidebar/other_article/');
    }

}
