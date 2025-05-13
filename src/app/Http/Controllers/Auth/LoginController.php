<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function redirectTo()
    {
        return '/contact/admin'; // ← ここに管理画面パスを指定
    }

    public function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectTo());
    }
}
