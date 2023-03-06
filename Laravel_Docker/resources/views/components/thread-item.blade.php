<div>
    @props(['thread' => $thread])
    <a href="{{ route('threads.detail', $thread) }}" class="p-4 block grid bg-white sm:rounded-lg border-1 shadow hover:bg-gray-100 duration-100">
        <span class="text-xl mb-1 ml-1">
            {{ $thread->title }}
        </span>
        <hr/>
        <span class="text-gray-800 ml-3 mt-1 mb-1 text-sm">
            {{ $thread->text }}
        </span>
        <span class="text-gray-600 text-sm ml-1">
            {{ $thread->created_at->diffForHumans() }}
        </span>
    </a>
</div>