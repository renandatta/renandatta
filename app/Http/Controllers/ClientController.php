<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $client;
    public function __construct(ClientRepository $client)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'Client']);
        $this->client = $client;
    }

    public function index()
    {
        return view('admin.client.index');
    }

    public function search(Request $request)
    {
        $clients = $this->client->search($request);
        if ($request->has('ajax')) return $clients;
        return view('admin.client._table', compact('clients'));
    }

    public function info(Request $request)
    {
        $id = $request->input('id') ?? null;
        $client = $this->client->find($id);
        if ($request->has('ajax')) return $client;
        return view('admin.client._info', compact('client'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $filename = $this->save_file($request);
        if ($filename != '') $request->merge(['image' => $filename]);

        return $this->client->save($request);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->input('id') ?? null;
        return $this->client->delete($id);
    }
}
