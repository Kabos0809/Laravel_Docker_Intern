<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-x-4">
            <a href="{{ route('threads') }}">
                <img src="/left-arrow.svg" width="30" height="30" alt="">
            </a>
            <div class="max-w-4xl">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight ml-5">{{ $thread->title }}</h1>
            </div> 
        </div>
    </x-slot>

    <div class="pt-5 px-5 pb-5 max-w-4xl bg-white mt-4 mx-auto my-8 shadow rounded-lg">
        <h2 class="text-xl text-black mb-2">スレの説明</h2>
        <hr/>
        <p class="text-lg text-gray-800 ml-2 mt-2 overflow-hidden">{{ $thread->text }}</p>
    </div>   

    @if ($responses->count())
    <div class="pt-6 max-w-4xl mx-auto grid bg-white mt-4 mb-12 rounded-lg shadow">
        @foreach ($responses as $response)
        <x-response-item :response="$response" :thread="$thread" />
        @endforeach
    </div>
    @else
    <center>
        <div>
            <img src="/mouse.svg" width="150" height="150" alt="" class="mt-16">
            <br/>
            <h2>まだ一件も書き込みがありません…</h2>
        </div>
    </center>
    @endif
    @auth('users')
    <div class="bg-white max-w-4xl mx-auto mt-8 p-8 pr-16 shadow rounded-lg mb-32">
        <form action="{{ route('user.response.store', $thread) }}" method="POST" class="ml-4 bg-white w-full">
            @csrf
            <label for="body">{{ __('レス作成')}}</label>
            <textarea name="body" id="body" cols="30" rows="6" class="w-full rounded-lg broder-2 bg-gray-100 mt-2 pt-1 pb-1 pl-2 pr-2 @error('response') border-red-500 @enderror"></textarea>
            <div class="mt-4">
                <button type="submit" class="bg-black rounded font-medium px-4 py-2 text-white">{{ __('レス送信') }}</button>
            </div>
        </form>
    </div>
    @endauth
    @guest('users')
    <div class="bg-white max-w-4xl mx-auto mt-16 mb-20 p-8 shadow rounded-lg">
        <center>
        <img src="/lock.svg" width="100" height="100" alt="" class="mb-2">
        <h2>レスを書き込むにはログインしてください</h2>
        <a href="{{ route('user.login') }}" class="text-blue-500 hover:text-blue-800 duration-100">
            {{ __('ログインはこちらから') }}
        </a>
        </center>
    </div>
    @endguest
</x-app-layout>