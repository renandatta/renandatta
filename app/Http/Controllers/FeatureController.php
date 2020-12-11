<?php

namespace App\Http\Controllers;

use App\Repositories\FeatureRepository;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    protected $feature;
    public function __construct(FeatureRepository $feature)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'Program Feature']);
        $this->feature = $feature;
    }

    public function index()
    {
        return view('admin.feature.index');
    }

    public function search(Request $request)
    {
        $features = $this->feature->search($request);
        if ($request->has('ajax')) return $features;
        return view('admin.feature._table', compact('features'));
    }

    public function info(Request $request)
    {
        $id = $request->input('id') ?? null;
        $feature = $this->feature->find($id);
        $parent_code = !empty($feature) ? $feature->parent_code : '#';
        $code = !empty($feature) ? $feature->code : $this->feature->code($parent_code);
        if ($request->has('ajax')) return $feature;
        return view('admin.feature._info', compact('feature', 'code', 'parent_code'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required', 'url' => 'required',
            'code' => 'required', 'parent_code' => 'required'
        ]);
        return $this->feature->save($request);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->input('id') ?? null;
        return $this->feature->delete($id);
    }
}
