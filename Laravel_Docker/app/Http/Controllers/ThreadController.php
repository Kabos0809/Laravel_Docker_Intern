<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thread;

class ThreadController extends Controller
{

    public function index()
    {
        $threads = Thread::latest()->paginate(20);

        return view('thread.index',[
            'threads' => $threads
        ]);
    }

    public function create()
    {
        return view('thread.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'text' => 'required|string|max:512',
        ]);

        $thread = DB::transaction(function () use ($request) {
            $request->user()->threads()->create([
                'title' => $request->title,
                'text' => $request->text,
            ]);
        });

        return redirect()->route('threads');
    }
}
