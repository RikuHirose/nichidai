<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;
use App\Repositories\LessonRepositoryInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    public function __construct(
        AdminUserServiceInterface $adminUserService,
        LessonRepositoryInterface $lessonRepository
    ) {
        $this->lessonRepository  = $lessonRepository;
        $this->adminUserService  = $adminUserService;
    }

    public function index(Request $request)
    {
        $q = \Request::query();

        if ($this->adminUserService->isSignedIn()) {
            /** @var \App\Models\AdminUser $agent */
            $adminUser = $this->adminUserService->getUser();
            $models = $this->lessonRepository->lessons();

            return view('pages.admin.index', [
                'models'        => $models,
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

            $models = $this->lessonRepository->lessonsByTopSearchAdmin($q);


            $search_result = '';
            foreach ($q as $key => $value) {
                if($value != null) {
                    $search_result .= '-'.$value;
                }
            }
            $search_result = $search_result.'-';
        }

        return view('pages.admin.index', [
            'models'   => $models,
            'searchQuery'   => true,
            'q'  => $q
        ]);
    }
}
