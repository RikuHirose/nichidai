<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Notifications\Slack;
use App\Services\SlackServiceInterface AS SlackPepo;

class SendSlackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slack:send {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Slack Notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(SlackPepo $slackHook)
    {
        $slackHook->notify(new Slack($this->argument('message')));
        $this->line('Send Completed.');
    }

}