<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendWelcomeEmail;


class SendWelcomeEmailListeners implements ShouldQueue
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $user = $event->user;

        $users = [
            'name' => $user->name,
            'email' => $user->email,
        ];
       
        Mail::to('jessiedelarnado@gmail.com')->send(new SendWelcomeEmail($users));
       
        // dd("Email Sent.");
    }
}
