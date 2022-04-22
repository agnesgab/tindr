<?php

namespace App\Listeners;

use App\Events\MatchEvent;
use App\Mail\MatchMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MatchListener
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

    public function handle($event)
    {
        $matchEmails = User::whereIn('id', [$event->getUserId(), $event->getLikedUserId()])->pluck('email')->toArray();

        foreach ($matchEmails as $email){
            Mail::to($email)->send(new MatchMail());
        }

    }
}
