<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(ServiceRepository $service)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'Service']);
        $this->service = $service;
    }

    public function index()
    {
        return view('admin.service.index');
    }

    public function search(Request $request)
    {
        $services = $this->service->search($request);
        if ($request->has('ajax')) return $services;
        return view('admin.service._table', compact('services'));
    }

    public function info(Request $request)
    {
        $id = $request->input('id') ?? null;
        $service = $this->service->find($id);
        if ($request->has('ajax')) return $service;
        return view('admin.service._info', compact('service'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $filename = $this->save_file($request);
        if ($filename != '') $request->merge(['image' => $filename]);
        else $request = new Request($request->except('image'));

        return $this->service->save($request);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->input('id') ?? null;
        return $this->service->delete($id);
    }
}
