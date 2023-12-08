<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function userProfile()
    {
        $profile = User::find(Auth::user()->id ?? '');

        return view('site.dashboard.profile', compact('profile'));

    }
}
