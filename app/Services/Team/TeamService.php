<?php

namespace App\Services\Team;

use App\Models\Team;
use App\Services\AbstractService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class TeamService extends AbstractService
{
    public function getBySearch(Builder $team, array $search = []): Builder
    {
        return $team;
    }

    public function save(array $params): Team
    {
        return DB::transaction(function () use ($params) {
            $saveUrl = '';

            if (! empty($params['image'] ?? '')) {
                $image = $params['image'];
                $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $saveUrl = 'upload/team/'.$name;
                @unlink(public_path($saveUrl));
                //MOVE O ARQUIVO PARA PASTA
                $image->move(public_path('upload/team'), $name);

                //AJUSTA O TAMANHO DO ARQUIVO
                $manager = ImageManager::withDriver(Driver::class);
                $image = $manager->read($saveUrl);
                $resizedImage = $image->resize(550, 670);
                $encodedImage = $resizedImage->toJpeg(75);
                $encodedImage->save(public_path($saveUrl));
            }

            $team = Team::create([
                'name' => $params['name'],
                'postion' => $params['postion'],
                'facebook' => $params['facebook'],
                'image' => $saveUrl,
                'created_at' => Carbon::now(),
            ]);

            return $team;
        });
    }

    public function update(Team $team, array $params): Team
    {
        return DB::transaction(function () use ($team, $params) {

            $saveUrl = $team->image;

            if (! empty($params['image'] ?? '')) {
                $image = $params['image'];
                $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $saveUrl = 'upload/team/'.$name;
                @unlink(public_path($saveUrl));
                //MOVE O ARQUIVO PARA PASTA
                $image->move(public_path('upload/team'), $name);

                //AJUSTA O TAMANHO DO ARQUIVO
                $manager = ImageManager::withDriver(Driver::class);
                $image = $manager->read($saveUrl);
                $resizedImage = $image->resize(550, 670);
                $encodedImage = $resizedImage->toJpeg(75);
                $encodedImage->save(public_path($saveUrl));
            }

            $team->update([
                'name' => $params['name'],
                'postion' => $params['postion'],
                'facebook' => $params['facebook'],
                'image' => $saveUrl,
                'updated_at' => Carbon::now(),
            ]);

            return $team;
        });

    }
}