<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientRepository extends Repository
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function search(Request $request)
    {
        $clients = $this->client;

        $name = $request->input('name');
        if ($name != '')
            $clients = $clients->where('name', 'like', "%$name%");

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $clients->paginate($paginate);
        return $clients->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->client->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($id == '') {
            $client = $this->client->create($request->all());
        } else {
            $client = $this->client->find($id);
            $client->update($request->all());
        }
        return $client;
    }

    public function delete($id)
    {
        $client = $this->client->find($id);
        if (!empty($client)) $client->delete();
        return $client;
    }
}
