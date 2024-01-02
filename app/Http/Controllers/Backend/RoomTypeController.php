<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomType = RoomType::orderBy('id', 'desc')->get();

        return view('backend.roomtype.index', compact('roomType'));
    }
}
