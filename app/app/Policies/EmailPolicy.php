<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Email;
use App\User;

class EmailPolicy
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

    public function show(User $user, Email $email)
    {
        return $user->id === $email->user_id;
    }
}
