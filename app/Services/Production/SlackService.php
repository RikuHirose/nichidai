<?php
namespace App\Services\Production;

use Illuminate\Notifications\Notifiable;
use App\Services\SlackServiceInterface;

class SlackService implements SlackServiceInterface
{
    use Notifiable;

    protected $slack;

    public function routeNotificationForSlack()
    {

      $url = 'https://hooks.slack.com/services/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';
        // return env('SLACK_WEBHOOK_URL');
      return $url;
    }
}