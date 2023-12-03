<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


 // Others
 use App\Models\User;
 use App\Notifications\NewChirp;
 use Illuminate\Support\Facades\Log;

 class SendChirpCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ChirpCreated $event): void
    {
        Log::info('Trace: Listeners-New Chrip');
        foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) {
            $user->notify(new NewChirp($event->chirp));
        }
    }
}
