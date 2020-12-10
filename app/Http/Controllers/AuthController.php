<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    const REDIRECT = 'admin';
    protected $auth;
    public function __construct(AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    public function login()
    {
        if (Auth::check()) return response()
            ->redirectToRoute(self::REDIRECT);
        return view('admin.auth.login');
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect()->route(self::REDIRECT);
    }

    public function proses_login(AuthRequest $request)
    {
        $auth = $this->auth->login(
            $request->input('email'),
            $request->input('password'),
            $request->has('remember')
        );
        if (!empty($auth['errors']))
            return redirect()->back()->withErrors($auth['errors']);
        return redirect()->route(self::REDIRECT);
    }
}
