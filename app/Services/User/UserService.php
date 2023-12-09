<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\AbstractService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserService extends AbstractService
{
    public function getBySearch(Builder $user, array $search = []): Builder
    {
        if (! empty($search['login']) ?? '') {
            $user->whereNameOrMailOrPhone($search['login']);
        }

        return $user;

    }

    public function profileSave(User $user, array $params): User
    {
        return DB::transaction(function () use ($user, $params) {
            $user->name = $params['name'];
            $user->email = $params['email'];
            $user->phone = $params['phone'];
            $user->address = $params['address'];
            $path = isset($params['path']) ? $params['path'] : 'admin_images';

            if (!empty( $params['photo'] ?? '')) {
                $file = $params['photo'];
                @unlink(public_path('upload/'.$path.'/'.$user->photo));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/'.$path), $fileName);
                $user['photo'] = $fileName;
            }

            $user->save();

            return $user;
        });
    }
}