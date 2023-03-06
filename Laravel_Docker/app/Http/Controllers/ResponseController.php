<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Response;

class ResponseController extends Controller
{
    public function store(Thread $thread, Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:512'
        ]);

        $thread->responses()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id
        ]);

        return back();
    }
}
