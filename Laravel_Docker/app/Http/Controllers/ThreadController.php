<?php

namespace App\Http\Controllers;

use App\Requests\ThreadUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thread;

class ThreadController extends Controller
{

    public function index()
    {
        $threads = Thread::latest()->paginate(10);

        return view('thread.index',[
            'threads' => $threads
        ]);
    }

    public function create()
    {
        return view('thread.create');
    }

    public function edit(Thread $thread)
    {
        return view('thread.update', [
            'thread' => $thread,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'text' => 'required|string|max:512',
        ]);

        $thread = DB::transaction(function () use ($request) {
            $thread = $request->user()->threads()->create([
                'title' => $request->title,
                'text' => $request->text,
            ]);

            return $thread;
        });

        return redirect()->route('thread.detail', $thread);
    }

    public function detail(Thread $thread)
    {
        $responses = $thread->responses()->with(['user'])->paginate(20);

        return view('thread.detail', [
            'thread' => $thread,
            'responses' => $responses,
        ]);
    }

    public function update(Thread $thread, ThreadUpdateRequest $request)
    {   
        $this->authorize('update', $thread);

        $thread->title = $request->title;
        $thread->text = $request->text;

        $thread->save();

        return redirect()->route('thread.detail', $thread);
    }

    public function destroy(Thread $thread)
    {   
        $this->authorize('delete', $thread);

        $thread->delete();

        return redirect()->route('threads');
    }
}
