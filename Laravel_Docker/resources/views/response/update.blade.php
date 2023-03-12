<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('コメント編集') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('update', $response)
                    <form action="{{ route('user.response.update', [$thread, $response]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="body">{{ __('レス本文 ※512文字') }}</label>
                            <textarea name="body" id="body" cols="30" rows="6" class="w-full rounded-lg border-2 bg-gray-2 bg-gray-100 @error('body') border-red-500 @enderror">{{ $response->body }}</textarea>

                            @error('body')
                            <div class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <center>
                            <button type="submit" class="w-96 bg-black rounded font-medium px-4 py-2 text-white rounded-2xl">{{ __('保存') }}</button>
                            </center>
                        </div>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>