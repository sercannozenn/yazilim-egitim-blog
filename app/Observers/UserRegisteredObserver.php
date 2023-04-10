<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\User;
use App\Models\UserVerify;
use App\Notifications\PasswordChangedNotification;
use App\Notifications\VerifyNotification;
use App\Traits\Loggable;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserRegisteredObserver
{
    use Loggable;

    public function __construct() {
        $this->model = User::class;
    }

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

        $this->log("create", $user->id, $user->toArray(), $this->model, true);

    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->wasChanged('password'))
        {
            $user->notify(new PasswordChangedNotification($user));
        }

        if (!$user->wasChanged('deleted_at'))
        {
            $this->updateLog($user, $this->model);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $this->log("delete", $user->id, $user->toArray(), $this->model);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        $this->log('restore', $user->id, $user->toArray(), $this->model);
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        $this->log('force delete', $user->id, $user->toArray(), $this->model);
    }

}
