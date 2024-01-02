<?php

namespace App\Services\BookArea;

use App\Models\BookArea;
use App\Services\AbstractService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BookAreaService extends AbstractService
{
    public function getBySearch(Builder $team, array $search = []): Builder
    {
        return $team;
    }

    public function update(BookArea $book, array $params): BookArea
    {
        return DB::transaction(function () use ($book, $params) {
            $saveUrl = $book->image;

            if (! empty($params['image'] ?? '')) {
                $image = $params['image'];
                $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $saveUrl = 'upload/bookarea/'.$name;
                @unlink(public_path($saveUrl));
                //MOVE O ARQUIVO PARA PASTA
                $image->move(public_path('upload/bookarea'), $name);

                //AJUSTA O TAMANHO DO ARQUIVO
                $manager = ImageManager::withDriver(Driver::class);
                $image = $manager->read($saveUrl);
                $resizedImage = $image->resize(1000, 1000);
                $encodedImage = $resizedImage->toJpeg(75);
                $encodedImage->save(public_path($saveUrl));
            }

            $book->update([
                'title' => $params['title'],
                'subtitle' => $params['subtitle'],
                'description' => $params['description'],
                'link' => $params['link'],
                'image' => $saveUrl,
                'updated_at' => Carbon::now(),
            ]);

            return $book;
        });
    }

}
