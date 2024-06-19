<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;
class AdminLoginController extends Controller
{

    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect('admin');
        } else {
            return view('login');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword
        ];
        if (Auth::attempt($login)) {
            return redirect('product');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    /**
     * action admin/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

}