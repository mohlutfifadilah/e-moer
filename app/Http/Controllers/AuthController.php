<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->id_level == 1 | $user->id_level == 2) {
                return redirect('/admin/dashboard/');
            } else {
                return redirect('/siswa/dashboard/');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate(
            [
                'ni' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('ni', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->id_level == 1 | $user->id_level == 2) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/siswa/dashboard');
            }
            return redirect()->intended('/');
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
