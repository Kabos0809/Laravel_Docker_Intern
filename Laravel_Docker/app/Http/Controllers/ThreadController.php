<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadUpdateRequest;
use App\Models\Thread;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function index(Request $request)
    {
        $threads = Thread::latest()->paginate(10);

        $search = $request->input('search');

        $query = Thread::query();

        if ($search) {
            $spaceConv = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConv, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('title', 'LIKE', "%{$value}%");
            }
        }

        $threads = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('thread.index', [
            'threads' => $threads
        ])->with('search', $search);
    }

    public function create()
    {
        return view('thread.create');
    }

    public function user_edit(Thread $thread)
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

        return redirect()->route('threads.detail', $thread);
    }

    public function admin_store(Request $request)
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

        return redirect()->route('admin.threads.detail', $thread);
    }

    public function detail(Thread $thread)
    {
        $responses = $thread->responses()->with(['user'])->paginate(20);

        return view('thread.detail', [
            'thread' => $thread,
            'responses' => $responses,
        ]);
    }

    public function admin_detail(Thread $thread)
    {
        $responses = $thread->responses()->with(['user'])->paginate(20);

        return view('thread.admin-detail', [
            'thread' => $thread,
            'responses' => $responses,
        ]);
    }

    public function user_update(Thread $thread, ThreadUpdateRequest $request)
    {   
        $this->authorize('update', $thread);

        $thread->title = $request->title;
        $thread->text = $request->text;

        $thread->save();

        return redirect()->route('threads.detail', $thread);
    }

    public function user_destroy(Thread $thread)
    {   
        $this->authorize('delete', $thread);

        $thread->delete();

        return redirect()->route('threads');
    }

    public function admin_destroy(Thread $thread)
    {
        $thread->delete();
        
        return redirect()->route('threads');
    }
}
