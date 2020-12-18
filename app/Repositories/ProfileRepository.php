<?php

namespace App\Repositories;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileRepository extends Repository
{
    protected $profile;
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function search(Request $request)
    {
        $profiles = $this->profile;

        $name = $request->input('name');
        if ($name != '')
            $profiles = $profiles->where('name', 'like', "%$name%");

        $type = $request->input('type');
        if ($type != '')
            $profiles = $profiles->where('type', $type);

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $profiles->paginate($paginate);
        return $profiles->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->profile->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($id == '') {
            $profile = $this->profile->create($request->all());
        } else {
            $profile = $this->profile->find($id);
            $profile->update($request->all());
        }
        return $profile;
    }

    public function delete($id)
    {
        $profile = $this->profile->find($id);
        if (!empty($profile)) $profile->delete();
        return $profile;
    }

    public function list_type()
    {
        return array('text' => 'Text', 'image' => 'Image');
    }
}
