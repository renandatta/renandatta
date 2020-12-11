<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($email, $password, $remember = false): array
    {
        $user = $this->user->where("email", $email)->first();
        if (empty($user)) return array("errors" => "Email not found");
        if (!Hash::check($password, $user->password)) return array("errors" => "Password doens't match");
        Auth::login($user, $remember);
        return array("success" => $user);
    }

    public function logout(): array
    {
        Auth::logout();
    }
}
