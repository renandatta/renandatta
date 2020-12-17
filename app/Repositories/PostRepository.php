<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository extends Repository
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function search(Request $request)
    {
        $posts = $this->post;

        $name = $request->input('name');
        if ($name != '')
            $posts = $posts->where('name', 'like', "%$name%");

        $category_id = $request->input('category_id');
        if ($category_id != '')
            $posts = $posts->where('category_id', "$category_id");

        $tags = $request->input('tags');
        if ($tags != '')
            $posts = $posts->where('tags', 'like', "%$tags%");

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $posts->paginate($paginate);
        return $posts->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->post->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($request->input('date' != ''))
            $request->merge(['data' => unformat_date($request->input('date'))]);
        if ($id == '') {
            $post = $this->post->create($request->all());
        } else {
            $post = $this->post->find($id);
            $post->update($request->all());
        }
        return $post;
    }

    public function delete($id)
    {
        $post = $this->post->find($id);
        if (!empty($post)) $post->delete();
        return $post;
    }
}
