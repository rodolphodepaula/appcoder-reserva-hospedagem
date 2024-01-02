<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookArea;
use App\Http\Requests\BookAreaUpdateRequest;
use App\Services\BookArea\BookAreaService;

class BookAreaController extends Controller
{
    public function __construct(private BookAreaService $srvBook)
    {}

    public function bookArea()
    {
        $book = BookArea::find(1);

        return view('backend.bookarea.book_area', compact('book'));
    }

    public function update(BookAreaUpdateRequest $request)
    {
        $params = $request->validated();
        $book = BookArea::find($params['id'] ?? '');
        $params['image'] = $request->file('image') ?? '';
        $book = $this->srvBook->update($book, $params);

        $notification = array(
            'message' => 'Equipe '.$book->title.' cadastrado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
