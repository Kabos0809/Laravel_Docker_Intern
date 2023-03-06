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

    <div class="pt-5 px-5 pb-5 max-w-4xl bg-white mt-4 mx-auto my-7 shadow">
        <h2 class="text-xl text-black mb-2">スレの説明</h2>
        <hr/>
        <p class="text-lg text-gray-800 ml-2 mt-2">{{ $thread->text }}</p>
    </div>   

    @if ($responses->count())
    <div class="pt-6 max-w-4xl mx-auto grid bg-white mt-4">
        @foreach ($responses as $response)
        <x-response-item :response="$resopnse" />
        @endforeach
    </div>
    @else
    <center>
        <div>
            <img src="/mouse.svg" width="150" height="150" alt="">
            <br/>
            <h2>まだ一件も書き込みがありません…</h2>
        </div>
    </center>
    @endif
</x-app-layout>