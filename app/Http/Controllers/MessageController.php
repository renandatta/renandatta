<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $message;
    public function __construct(MessageRepository $message)
    {
        $this->middleware(['auth', 'admin']);
        view()->share(['title' => 'Message']);
        $this->message = $message;
    }

    public function index()
    {
        return view('admin.message.index');
    }

    public function search(Request $request)
    {
        $messages = $this->message->search($request);
        if ($request->has('ajax')) return $messages;
        return view('admin.message._table', compact('messages'));
    }
}
