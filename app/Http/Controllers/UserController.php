<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $srvUser){}

    public function index()
    {
        return view('site.index');
    }

    public function userProfile()
    {
        $profile = User::find(Auth::user()->id ?? '');

        return view('site.dashboard.profile', compact('profile'));

    }

    public function store(ProfileUserRequest $request)
    {
        $user = User::find(Auth::user()->id);

        $params = $request->validated();
        $params['photo'] = $request->file('photo') ?? '';
        $params['path'] = 'user_images';

        $user = $this->srvUser->profileSave($user, $params);

        $notification = array(
            'message' => 'Perfil atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Usuário desconectado',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }
}
