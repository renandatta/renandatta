<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository extends Repository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function search(Request $request)
    {
        $users = $this->user;

        $name = $request->input('name');
        if ($name != '')
            $users = $users->where('name', 'like', "%$name%");

        $email = $request->input('email');
        if ($email != '')
            $users = $users->where('email', 'like', "%$email%");

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $users->paginate($paginate);
        return $users->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->user->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($id == '') {
            $user = $this->user->create($request->all());
        } else {
            $user = $this->user->find($id);
            $user->update($request->all());
        }
        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        if (!empty($user)) $user->delete();
        return $user;
    }
}
