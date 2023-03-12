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

  <form method="GET" action="{{ route('threads') }}" class="max-w-4xl mt-6 mx-auto pl-32 flex items-center space-x-4">
    <input type="search" placeholder="スレッドタイトルを入力" name="search" value="@if (isset($search)) {{ $search }} @endif" class="w-2/3 rounded-lg">
      <button type="submit" class="bg-black hover:bg-gray-800 text-white p-2 px-4 rounded-lg duration-100">検索</button>
      <button>
          <a href="{{ route('threads') }}" class="bg-gray-600 hover:bg-gray-700 text-white p-2 px-4 rounded-lg duration-100">
              クリア
          </a>
      </button>
  </form>

  @if($search)
  <div class="max-w-4xl mx-auto mt-4 pl-16">
    {{ $search }}{{ __('の検索結果') }}
  </div>
  @endif

  <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8 grid gap-y-2">
    @if ($threads->count())
      @foreach ($threads as $thread)
        <x-thread-item :thread="$thread" />
      @endforeach
    @else
      スレッドがありません
    @endif
    {{ $threads->appends(Request::only('keyword'))->links() }}
  </div>
</x-app-layout>