<x-app-layout>
  <x-slot name="header">
    <div class="gap-x-4 flex item-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('スレッド一覧') }}
      </h2>
      @auth('users')
      <div>
        <a href="{{ route('user.threads.create') }}" class="text-gray-600 border-b-2 border-white hover:border-blue-400 duration-200 pb-6 px-1 font-bold">{{ __('スレッド作成') }}</a>
      </div>
      @endauth
    </div>
  </x-slot>

  <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8 grid gap-y-2">
    @if ($threads->count())
      @foreach ($threads as $thread)
        <x-thread-item :thread="$thread" />
      @endforeach
    @else
      スレッドがありません
    @endif
    {{ $threads->links() }}
  </div>
</x-app-layout>