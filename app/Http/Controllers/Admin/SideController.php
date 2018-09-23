<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;
use App\Repositories\LessonRepositoryInterface;
use Illuminate\Http\Request;

class SideController extends Controller
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

}
