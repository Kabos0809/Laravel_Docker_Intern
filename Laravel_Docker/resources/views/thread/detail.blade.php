<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-x-4">
            <a href="{{ route('threads') }}">
                <img src="/left-arrow.svg" width="40" height="40" alt="">
            </a>
            <div class="max-w-4xl">
                <h1 class="font-semibold text-xl text-gray-800 leading-tihgt">{{ $thread->title }}</h1>
            </div>
            <div class="max-w-4xl">
                {{ $thread->text }}
            </div>    
        </div>
    </x-slot>

    <div class="pt-6 max-w-4xl mx-auto grid bg-white mt-4">
        @if ($responses->count())
            @foreach ($responses as $response)
            <x-response-item :response="$resopnse" />
            @endforeach
        @else
            <div class="max-w-xl object-center">
                <img src="/mouse.svg" width="150" height="150" alt="">
                <h2>まだ一件も書き込みがありません…</h2>
            </div>
        @endif
    </div>
</x-app-layout>