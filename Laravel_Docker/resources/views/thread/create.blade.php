<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('スレッド作成') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('thread.create') }}" method="POST">
                        @csrf
                        <div>
                            <label for="title">{{ __('スレタイ ※30文字') }}</label>
                            <textarea name="title" id="title" cols="30" row="2"
                </div>
            </div>
        </div>
    </div>
</x-app-layout>