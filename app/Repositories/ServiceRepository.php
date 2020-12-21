<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceRepository extends Repository
{
    protected $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function search(Request $request)
    {
        $services = $this->service;

        $name = $request->input('name');
        if ($name != '')
            $services = $services->where('name', 'like', "%$name%");

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $services->paginate($paginate);
        return $services->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->service->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($id == '') {
            $service = $this->service->create($request->all());
        } else {
            $service = $this->service->find($id);
            $service->update($request->all());
        }
        return $service;
    }

    public function delete($id)
    {
        $service = $this->service->find($id);
        if (!empty($service)) $service->delete();
        return $service;
    }
}
