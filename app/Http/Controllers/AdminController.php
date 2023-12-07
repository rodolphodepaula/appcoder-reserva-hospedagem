<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileAdminPasswordRequest;
use App\Http\Requests\ProfileAdminRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(private UserService $srvUser){}
    public function dashboard()
    {
        return view('admin.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function login()
    {
        return view('admin.admin_login');
    }

    public function profile()
    {
        $profile = User::find(Auth::user()->id ?? '');

        return view('admin.admin_profile', compact('profile'));
    }

    public function profileStore(ProfileAdminRequest $request)
    {
        $user = User::find(Auth::user()->id);

        $params = $request->validated();
        $params['photo'] = $request->file('photo') ?? '';

        $user = $this->srvUser->profileSave($user, $params);

        $notification = array(
            'message' => 'Perfil atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changePassword ()
    {
        $profile = User::find(Auth::user()->id ?? '');

        return view('admin.admin_change_password', compact('profile'));
    }

    public function passwordUpdate(ProfileAdminPasswordRequest $request)
    {
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'A senha antiga não confere!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Senha alterado com sucesso!',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
}
