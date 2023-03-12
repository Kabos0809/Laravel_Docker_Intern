<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Http\Requests\ResponseUpdateRequest;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResponseController extends Controller
{

    public function edit(Thread $thread, Response $response)
    {
        return view('response.update', [
            'thread' => $thread,
            'response' => $response,
        ]);
    }

    public function user_store(Thread $thread, Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:512'
        ]);

        $thread->responses()->create([
            'body' => $request->body,
            'user_id' => Auth::guard('users')->user()->id
        ]);

        return back();
    }

    public function user_update(Thread $thread, Response $response, ResponseUpdateRequest $request)
    {   
        $this->authorize('update', $response);

        $response->body = $request->body;
        $response->save();

        return redirect()->route('threads.detail', $thread);
    }

    public function user_destroy(Thread $thread, Response $response)
    {
        $this->authorize('delete', $response);

        $response->delete();

        return redirect()->route('threads.detail', $thread);
    }

    public function admin_destroy(Thread $thread, Response $response)
    {
        $response->delete();

        return redirect()->route('admin.threads.detail', $thread);
    }
}
