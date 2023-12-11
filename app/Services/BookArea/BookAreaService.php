<?php

namespace App\Services\BookArea;

use App\Services\AbstractService;
use Illuminate\Database\Eloquent\Builder;

class BookAreaService extends AbstractService
{
    public function getBySearch(Builder $team, array $search = []): Builder
    {
        return $team;
    }

}
