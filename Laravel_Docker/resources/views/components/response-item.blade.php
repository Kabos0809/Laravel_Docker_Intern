<div>
    @props(['resopnse' => $response])
    <div class="border-b-2 p-4">
        <span class="text-sm font-bold">{{ $response->user->name }}</span>
        <span class="text-sm text-gray-600">{{ $response->created_at->toDateTimeString() }}</span>

        <p>{{ $response->body }}</p>
    </div>
</div>