<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserVerify;
use App\Notifications\VerifyNotification;
use Illuminate\Support\Str;

class UserRegisteredObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $token = Str::random("60");

        UserVerify::create([
            'user_id' => $user->id,
            "token" => $token
        ]);
        $user->notify(new VerifyNotification($token));
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {

    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
