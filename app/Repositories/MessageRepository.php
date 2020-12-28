<?php

namespace App\Repositories;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageRepository extends Repository
{
    protected $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function search(Request $request)
    {
        $messages = $this->message->orderBy('id', 'desc');

        $name = $request->input('name');
        if ($name != '')
            $messages = $messages->where('name', 'like', "%$name%");

        $paginate = $request->input('paginate') ?? null;
        if ($paginate != null) return $messages->paginate($paginate);
        return $messages->get();
    }

    public function find($value, $column = 'id')
    {
        return $this->message->where($column, $value)->first();
    }

    public function save(Request $request)
    {
        $id = $request->input('id') ?? '';
        if ($id == '') {
            $message = $this->message->create($request->all());
        } else {
            $message = $this->message->find($id);
            $message->update($request->all());
        }
        return $message;
    }

    public function delete($id)
    {
        $message = $this->message->find($id);
        if (!empty($message)) $message->delete();
        return $message;
    }
}
