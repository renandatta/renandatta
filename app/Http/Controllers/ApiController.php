<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $message;
    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
    }

    public function message_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        return $this->message->save($request);
    }
}
