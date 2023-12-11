<?php

namespace App\Http\Controllers;

use App\Models\BookArea;
use App\Services\BookArea\BookAreaService;
use Illuminate\Http\Request;

class BookAreaController extends Controller
{
    public function __construct(private BookAreaService $srvBook)
    {}

    public function bookArea()
    {
        $book = BookArea::find(1);

        return view('backend.bookarea.book_area', compact('book'));
    }
}
