<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\AdminNewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAdminOnUserRegistration implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $adminEmail = env('ADMIN_EMAIL', 'mdabdullajovayer@gmail.com');
        $user = $event->user;

        // Send email using the AdminNewUserNotification Mailable
        Mail::to($adminEmail)->send(new AdminNewUserNotification($user));
    }
}
