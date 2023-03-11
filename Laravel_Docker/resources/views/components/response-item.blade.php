<div>
    @props(['resopnse' => $response, 'thread' => $thread])
    <div class="border-b-2 p-4">
        <span class="text-sm font-bold">{{ $response->user->name }}</span>
        <span class="text-sm text-gray-600">{{ $response->created_at->toDateTimeString() }}</span>
        @if($response->created_at != $response->updated_at)
        <span class="text-sm text-gray-500">{{ __('編集済み')}}</span>
        @endif
        <p>{{ $response->body }}</p>
        <div class="gap-x-4 flex item-center mt-1">
            @auth('users')
            @if(auth('users')->user()->id === $response->user_id)
            <a href="{{ route('user.response.update', [$thread, $response]) }}">
                <button class="text-green-500 hover:text-green-700 duration-100 rounded-lg p-1 pl-2 pr-2">{{ __('編集') }}</button>
            </a>
            <form action="{{ route('user.response.delete', [$thread, $response]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 duration-100 rounded-lg p-1 pl-2 pr-2">{{ __('削除') }}</button>
            </form>
            @endif
            @endauth
            @auth('admins')
            <form action="{{ route('admin.response.delete', [$thread, $response]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 duration-100 rounded-lg p-1 pl-2 pr-2">{{ __('削除') }}</button>
            </form>
            @endauth
        </div>
    </div>
</div>