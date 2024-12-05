<x-app-layout>

    @slot('title', 'Stores');
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-card class="maxw2x">
                    <img src={{ $store->logo }} alt="{{ $store->name }}" class="size-16">
                    <x-card.header>
                        <x-card.title>
                            {{ $store->name }}
                        </x-card.title>

                    </x-card.header>
                    <x-card.content>
                        {{ Str::limit($store->description, 50) }}
                    </x-card.content>
                    @auth
                        @if (auth()->user()->id === $store->user_id)
                            <a href="{{ route('stores.edit', $store) }}" class="text-blue-500 hover:underline">Edit</a>
                        @endif
                    @endauth
                </x-card>
            @endforeach
        </div>

    </x-container>
</x-app-layout>
