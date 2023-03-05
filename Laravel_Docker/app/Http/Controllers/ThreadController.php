<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        return view('thread.index');
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

        DB::transaction(function () use ($request) {
            $thread = $request->user()->threads()->create([
                'title' => $request->title,
                'text' => $request->text,
            ]);

            $thread->comments()->create([
                'text' => $request->body,
            ]);
        });

        return  back();
    }
}
