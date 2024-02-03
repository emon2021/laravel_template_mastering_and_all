<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use App\Mail\PostMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendPostNotification
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
    public function handle(PostProcessed $event): void
    {
        //__email notification sending to all user__//
        $users = User::all();
        foreach($users as $user)
        {
            Mail::to($user()->email)->send(new PostMail($event->post ));
        }
        
    }
}
