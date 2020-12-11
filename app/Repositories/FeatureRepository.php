<?php

namespace App\Repositories;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureRepository
{
    protected $feature;
    public function __construct(Feature $feature)
    {
        $this->feature = $feature;
    }

    public function search(Request $request)
    {
        $features = $this->feature;

        $name = $request->input('name');
        if ($name != '')
            $features = $features->where('name', 'like', "%$name%");

        $url = $request->input('url');
        if ($url != '')
            $features = $features->where('url', 'like', "%$url%");

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $features->paginate($paginate);
        return $features->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->feature->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($id == '') {
            $feature = $this->feature->create($request->all());
        } else {
            $feature = $this->feature->find($id);
            $feature->update($request->all());
        }
        return $feature;
    }

    public function delete($id)
    {
        $feature = $this->feature->find($id);
        $feature->delete();
        return $feature;
    }

    protected $skip = array();
    public function nested_data($data, $parent_kode = '#')
    {
        $result = array();
        foreach ($data as $item) {
            if (!in_array($item->id, $this->skip) && $item->parent_kode == $parent_kode) {
                array_push($this->skip, $item->id);
                $item->children = $this->nested_data($data, $item->kode);
                array_push($result, $item);
            }
        }
        return $result;
    }
}
