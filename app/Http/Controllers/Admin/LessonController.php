<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminUserServiceInterface;

class LessonController extends Controller
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    public function __construct(
        AdminUserServiceInterface $adminUserService
    ) {
        $this->adminUserService  = $adminUserService;
    }

    public function index()
    {
        
        if ($this->adminUserService->isSignedIn()) {
            /** @var \App\Models\AdminUser $agent */
            $adminUser = $this->adminUserService->getUser();

            return view('pages.admin.index', [
            ]);
        }

        return view('pages.admin.index', []);
    }
}
