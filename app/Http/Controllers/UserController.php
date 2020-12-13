<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserRepository $user)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'User Program']);
        $this->user = $user;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function search(Request $request)
    {
        $users = $this->user->search($request);
        if ($request->has('ajax')) return $users;
        return view('admin.user._table', compact('users'));
    }

    public function info(Request $request)
    {
        $id = $request->input('id') ?? null;
        $user = $this->user->find($id);
        if ($request->has('ajax')) return $user;
        return view('admin.user._info', compact('user'));
    }

    public function save(Request $request)
    {
        if (($request->input('id') ?? '') != '') {
            $validation = [
                'name' => 'required', 'email' => 'required|email',
            ];
        } else {
            $validation = [
                'name' => 'required', 'email' => 'required|email',
                'password' => 'required|confirmed',
            ];
        }
        $request->validate($validation);

        return $this->user->save($request);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->input('id') ?? null;
        return $this->user->delete($id);
    }
}
