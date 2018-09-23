<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;

use App\Repositories\UserRepositoryInterface;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    public function __construct(
        AdminUserServiceInterface          $adminUserService,
        UserRepositoryInterface            $userRepository
    ) {
        $this->adminUserService            = $adminUserService;
        $this->userRepository              = $userRepository;
    }


    public function index(Request $request)
    {
        $q = \Request::query();

        if ($this->adminUserService->isSignedIn()) {
            /** @var \App\Models\AdminUser $agent */
            $adminUser = $this->adminUserService->getUser();
            $users = $this->userRepository->users();


            return view('pages.admin.index', [
                'users'        => $users,
                'searchQuery'   => false,
                'q'             => $q
            ]);
        }

        return view('pages.admin.index', []);
    }



    public function searchIndexAdmin(Request $request)
    {
        $q = \Request::query();

        if(isset($q)) {

            $users = $this->userRepository->usersByTopSearchAdmin($q);

            $search_result = '';
            foreach ($q as $key => $value) {
                if($value != null) {
                    $search_result .= '-'.$value;
                }
            }
            $search_result = $search_result.'-';
        }

        return view('pages.admin.index', [
            'users'   => $users,
            'searchQuery'   => true,
            'q'  => $q
        ]);
    }


    public function edit(Lesson $lesson, Request $request)
    {
        $model = $lesson;

        $lesson_schedule = $this->lessonScheduleRepository->getRounds($model->id);
        $reviews         = $this->reviewRepository->getReviews($model->id);
        $affiliates      = $this->affiliateRepository->getAffiliates($model->id);

        return view('pages.admin.lessons.edit', [
            'model'            => $model,
            'lesson_schedule'  => $lesson_schedule,
            'reviews'          => $reviews,
            'affiliates'       => $affiliates
        ]);
    }

    public function update(Lesson $lesson, Request $request)
    {
        $input = $request->only($this->lessonRepository->getBlankModel()->getFillable());


         if(!isset($input['popular_id'])) {
            array_set($input, 'popular_id', 0);
        }

        if(!isset($input['recommend_id'])) {
            array_set($input, 'recommend_id', 0);
        }

        $lesson = $this->lessonRepository->update($lesson, $input);


        if (empty($lesson)) {
            return redirect()->back()->withErrors('failed');
        }

        $lesson_schedule = $this->lessonScheduleRepository->getRounds($lesson->id);
        $reviews = $this->reviewRepository->getReviews($lesson->id);
        $affiliates      = $this->affiliateRepository->getAffiliates($lesson->id);

        return view('pages.admin.lessons.edit', [
            'model'            => $lesson,
            'lesson_schedule'  => $lesson_schedule,
            'reviews'          => $reviews,
            'affiliates'       => $affiliates
        ]);

    }


    public function destroy(Lesson $lesson)
    {
        $this->lessonRepository->delete($lesson);

        return redirect()->action('Admin\IndexController@index')->with(
            'message-success',
            trans('admin.messages.general.delete_success')
        );
    }
}
