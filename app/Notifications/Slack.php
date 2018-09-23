<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class Slack extends Notification
{
    use Queueable;

    protected $content;
    protected $channel;
    protected $name;
    protected $email;
    protected $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $message)
    {
        $this->channel = env('SLACK_CHANNEL');
        $this->name    = $name;
        $this->email   = $email;
        $this->subject = $subject;
        $this->content = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * @param $notifiable
     * @return $this
     */
    public function toSlack($notifiable)
    {

        return (new SlackMessage)
            ->to($this->channel)
            ->success()
            ->attachment(function ($attachment) {
                $attachment->fields([
                                'name'    => $this->name,
                                'subject' => $this->subject,
                                'email'   => $this->email,
                            ]);
            })
            ->content($this->content);
    }
}
