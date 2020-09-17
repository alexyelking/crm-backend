<?php

namespace App\Repositories;

use App\User;
use Carbon\Carbon;

class UserRepository
{
    private const MAX_EMAILS_PER_DAY = 1;
    /**
     * @param User $user
     * @return int
     */
    public function restOfEmails($user)
    {
        $rest = self::MAX_EMAILS_PER_DAY;
        $email = $user->emails->last();
        if ($email != NULL) {
            if (!$email->created_at->lt(Carbon::now()->subMinutes(2))) {
                $rest = 0;
            }
        }
        return $rest;
    }
}