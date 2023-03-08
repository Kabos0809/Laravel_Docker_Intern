<div>
    @props(['resopnse' => $response, 'thread' => $thread])
    <div class="border-b-2 p-4">
        <span class="text-sm font-bold">{{ $response->user->name }}</span>
        <span class="text-sm text-gray-600">{{ $response->created_at->toDateTimeString() }}</span>
        
        <p>{{ $response->body }}</p>
        <div class="gap-x-4 flex item-center mt-3 mb-2">
            @can('update', $response)
            <a href="{{ route('response.update', [$thread, $response]) }}">
                <button class="bg-green-500 text-white rounded-lg p-1 pl-2 pr-2">{{ __('編集') }}</button>
            </a>
            @endcan
            @can('delete', $response)
            <form action="{{ route('response.delete', [$thread, $response]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white rounded-lg p-1 pl-2 pr-2">{{ __('削除') }}</button>
            </form>
            @endcan
        </div>
    </div>
</div>