<?php
namespace App\Listeners;

use App\Events\PendingUserRegistered;
use App\Mail\PendingUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPendingUserNotification
{
    public function handle(PendingUserRegistered $event)
    {
        // Kirim email ke admin
        Mail::to('kikirizki0455@gmail.com')->send(new PendingUserNotification($event->pendingUser));

        // Kirim email ke user
        Mail::to($event->pendingUser->email)->send(new PendingUserNotification($event->pendingUser, true));
    }
}