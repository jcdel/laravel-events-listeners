<?php

namespace App\Listeners;

use App\Events\LoginNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendLoginNotification;


class SendLoginNotificationListeners implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoginNotification  $event
     * @return void
     */
    public function handle(LoginNotification $event)
    {
        $user = $event->user;

        $users = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        // Send Login Notification
        Mail::to($user->email)->send(new SendLoginNotification($users));
    }
}
