<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use App\MonAn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function getLogin()
    {
        if(Auth::check())
        {
            return redirect('/');
        }
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $data = [
            'username'=>$request->username,
            'password'=>$request->password,
            'LoaiTK'=>'Admin'
        ];

        if(Auth::attempt($data))
        {
            return redirect('/');
        }
        else
        {
            return redirect('login')->with('status', 'Tài khoản hoặc Mật khẩu không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function username()
    {
        return 'username';
    }
}
