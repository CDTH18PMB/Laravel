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
            'LoaiTK'=>'Admin',
            'TrangThai'=>1
        ];

        if(Auth::attempt($data))
        {
            $name = TaiKhoan::where('username', $data['username'])->get();
            $request->session()->push('name', $name[0]->AnhDaiDien);
            $request->session()->push('name', $name[0]->HoTen);
            return redirect('/');
        }
        else
        {
            return redirect('login')->with('status', 'Tài khoản hoặc Mật khẩu không chính xác');
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('login');
    }

    public function username()
    {
        return 'username';
    }
}
