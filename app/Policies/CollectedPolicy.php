<?php

namespace App\Policies;

use App\Collected;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollectedPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param Collected $collected
     * @param User $user
     * @return bool
     */
    public function view(Collected $collected, User $user)
    {
        return $user->id === $collected->userID;
    }
}
