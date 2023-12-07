<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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

    public function profileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $data['photo'] = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'Perfil atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
