<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository extends Repository
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function search(Request $request)
    {
        $categories = $this->category;

        $name = $request->input('name');
        if ($name != '')
            $categories = $categories->where('name', 'like', "%$name%");

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $categories->paginate($paginate);
        return $categories->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->category->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($id == '') {
            $category = $this->category->create($request->all());
        } else {
            $category = $this->category->find($id);
            $category->update($request->all());
        }
        return $category;
    }

    public function delete($id)
    {
        $category = $this->category->find($id);
        if (!empty($category)) $category->delete();
        return $category;
    }
}
