<?php

namespace App\Listeners;

use App\Notifications\NewReservationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewReservationNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::where('access', 'admin')->get();

        Notification::send($admin, new NewReservationNotification($event->user));
    }
}
