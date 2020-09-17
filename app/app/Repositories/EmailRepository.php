<?php

namespace App\Repositories;

use App\Email;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class EmailRepository
{
    private const MAX_EMAILS_PER_DAY = 1;
    /**
     * @param User $user
     * @return int
     */
    public function restByUser($user)
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

    /**
     * @param User $user
     * @param $limit
     * @return LengthAwarePaginator
     */
    public function paginateByUser($user, $limit)
    {
        return $user->emails()->paginate($limit);
    }

    /**
     * @param User $user
     * @param array $data
     * @return Email|Model
     */
    public function storeByUser($user, $data)
    {
        return $user->emails()->create($data);
    }
}