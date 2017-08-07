<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Mail\MarkDownEmails;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class WelcomeNewUserListener
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
     * @param  NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        //
        Mail::to($event->user->email)->send(new MarkDownEmails($event->user));
    }
}
