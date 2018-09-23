<?PHP

namespace App\Services;

use LaravelRocket\Foundation\Services\BaseServiceInterface;

interface SlackServiceInterface extends BaseServiceInterface
{
   public function routeNotificationForSlack();
}
