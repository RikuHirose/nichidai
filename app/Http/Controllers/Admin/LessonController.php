<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;

use App\Repositories\LessonRepositoryInterface;
use App\Repositories\LessonScheduleRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\AffiliateRepositoryInterface;

use App\Models\Lesson;
use App\Models\Affiliate;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    public function __construct(
        AdminUserServiceInterface          $adminUserService,
        LessonRepositoryInterface          $lessonRepository,
        LessonScheduleRepositoryInterface  $lessonScheduleRepository,
        ReviewRepositoryInterface          $reviewRepository,
        AffiliateRepositoryInterface       $affiliateRepository
    ) {
        $this->adminUserService            = $adminUserService;
        $this->lessonRepository            = $lessonRepository;
        $this->lessonScheduleRepository    = $lessonScheduleRepository;
        $this->reviewRepository            = $reviewRepository;
        $this->affiliateRepository         = $affiliateRepository;
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
        $reviews         = $this->reviewRepository->getReviews($lesson->id);
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



    // Affiliate
    public function affiliateStore(Lesson $lesson, Affiliate $affiliate, Request $request)
    {
        $input     = $request->only($this->affiliateRepository->getBlankModel()->getFillable());
        $affiliate = $this->affiliateRepository->create($input);



         return redirect()->action('Admin\LessonController@edit', $input['lesson_id']);
    }


    public function affiliateupdate(Affiliate $affiliate, Request $request)
    {
        $input = $request->only($this->affiliateRepository->getBlankModel()->getFillable());


        if(!isset($input['lesson_textbook_id'])) {
            array_set($input, 'lesson_textbook_id', 0);
        }

        if(!isset($input['lesson_read_id'])) {
            array_set($input, 'lesson_read_id', 0);
        }


        $affiliate = $this->affiliateRepository->update($affiliate, $input);

        return redirect()->action('Admin\LessonController@edit', $input['lesson_id']);
    }
}
