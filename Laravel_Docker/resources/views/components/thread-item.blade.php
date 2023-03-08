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
        <span>
            <p class="text-gray-600 text-sm ml-1">
                {{ $thread->created_at->diffForHumans() }}
            </p>
        </span>
    </a>
    <div class="gap-x-2 flex pl-2 mb-2">
        @can('update', $thread)
        <a href="{{ route('threads.update', $thread) }}">
            <button class="text-green-500 hover:text-green-700 duration-100 rounded-lg p-1 pl-2 pr-2">{{ __('編集') }}</button>
        </a>
        @endcan
        @can('delete', $thread)
        <form action="{{ route('threads.delete', $thread) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700 duration-100 rounded-lg p-1 pl-2 pr-2">{{ __('削除') }}</button>
        </form>
        @endcan
    </div>
</div>