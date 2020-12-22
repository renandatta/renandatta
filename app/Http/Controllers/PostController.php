<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post, $category;
    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'Post']);
        view()->share(['categories' => $category->search(new Request())
            ->pluck('name', 'id')->toArray()]);
        $this->post = $post;
    }

    public function index()
    {
        return view('admin.post.index');
    }

    public function search(Request $request)
    {
        $posts = $this->post->search($request);
        if ($request->has('ajax')) return $posts;
        return view('admin.post._table', compact('posts'));
    }

    public function info(Request $request)
    {
        $id = $request->input('id') ?? null;
        $post = $this->post->find($id);
        if ($request->has('ajax')) return $post;
        return view('admin.post._info', compact('post'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);

        $filename = $this->save_file($request);
        if ($filename != '') $request->merge(['image' => $filename]);

        return $this->post->save($request);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->input('id') ?? null;
        return $this->post->delete($id);
    }
}
