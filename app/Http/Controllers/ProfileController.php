<?php

namespace App\Http\Controllers;

use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profile;
    public function __construct(ProfileRepository $profile)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'Profile']);
        view()->share(['types' => $profile->list_type()]);
        $this->profile = $profile;
    }

    public function index()
    {
        return view('admin.profile.index');
    }

    public function search(Request $request)
    {
        $profiles = $this->profile->search($request);
        if ($request->has('ajax')) return $profiles;
        return view('admin.profile._table', compact('profiles'));
    }

    public function info(Request $request)
    {
        $id = $request->input('id') ?? null;
        $profile = $this->profile->find($id);
        if ($request->has('ajax')) return $profile;
        return view('admin.profile._info', compact('profile'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        if ($request->input('type') == 'image') {
            $filename = $this->save_file($request, 'image');
            if ($filename != '') $request->merge(['content' => $filename]);
            else $request = new Request($request->except('content'));
        }

        return $this->profile->save($request);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->input('id') ?? null;
        return $this->profile->delete($id);
    }
}
