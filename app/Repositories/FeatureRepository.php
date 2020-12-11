<?php

namespace App\Repositories;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureRepository extends Repository
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
        if (!empty($feature)) $feature->delete();
        return $feature;
    }

    protected $skip = array();
    public function nested_data($data, $parent_code = '#')
    {
        $result = array();
        foreach ($data as $item) {
            if (!in_array($item->id, $this->skip) && $item->parent_code == $parent_code) {
                array_push($this->skip, $item->id);
                $item->children = $this->nested_data($data, $item->code);
                array_push($result, $item);
            }
        }
        return $result;
    }

    public function code($parent_code)
    {
        return $this->auto_code($this->feature, $parent_code);
    }
}
