<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomTypeStoreRequest;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomType = RoomType::orderBy('id', 'desc')->get();

        return view('backend.roomtype.index', compact('roomType'));
    }

    public function create()
    {
        return view('backend.roomtype.create');
    }

    public function store(RoomTypeStoreRequest $request)
    {
        RoomType::insert([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Tipo de Quarto cadastrado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('room.type.index')->with($notification);

    }
}
