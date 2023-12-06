<?php

namespace App\Services\User;

use App\Services\AbstractService;
use Illuminate\Database\Eloquent\Builder;

class UserService extends AbstractService
{
    public function getBySearch(Builder $user, array $search = []): Builder
    {
        if (! empty($search['login']) ?? '') {
            $user->whereNameOrMailOrPhone($search['login']);
        }

        return $user;

    }
}