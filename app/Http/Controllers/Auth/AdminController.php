<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Pos\Admin\Requests\LoginRequestAdmin;

class AdminController extends Controller
{
    public function create()
    {
        return view('auth.admin_login');
    }

    public function store(LoginRequestAdmin $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN);
    }
}
