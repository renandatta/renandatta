<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryRepository $category)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'Post Category']);
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.category.index');
    }

    public function search(Request $request)
    {
        $categories = $this->category->search($request);
        if ($request->has('ajax')) return $categories;
        return view('admin.category._table', compact('categories'));
    }

    public function info(Request $request)
    {
        $id = $request->input('id') ?? null;
        $category = $this->category->find($id);
        if ($request->has('ajax')) return $category;
        return view('admin.category._info', compact('category'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        return $this->category->save($request);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->input('id') ?? null;
        return $this->category->delete($id);
    }
}
