<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Response;
use App\Http\Requests\ResponseUpdateRequest;

class ResponseController extends Controller
{

    public function edit(Thread $thread, Response $response)
    {
        return view('response.update', [
            'thread' => $thread,
            'response' => $response,
        ]);
    }

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

    public function update(Thread $thread, Response $response, ResponseUpdateRequest $request)
    {   
        $this->authorize('update', $response);

        $response->body = $request->body;
        $response->save();

        return redirect()->route('threads.detail', $thread);
    }

    public function destroy(Thread $thread, Response $response)
    {
        $this->authorize('delete', $response);

        $response->delete();

        return redirect()->route('threads.detail', $thread);
    }
}
