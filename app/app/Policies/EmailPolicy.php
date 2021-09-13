<?php

namespace App\Policies;

use App\Email;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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
