<x-app-layout>

    @slot('title', $title);
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __($header) }}
        </h2>
    </x-slot>

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <div class="flex">
                    <x-card.title>
                        {{ $header }}
                    </x-card.title>
                    @if ($header === 'Edit')
                        <form action={{ route('stores.destroy', $store) }} method="post" class="ml-auto">
                            @method('DELETE')
                            @csrf
                            <x-primary-button class="bg-red-500" type="submit">Delete Store</x-primary-button>
                        </form>
                    @endif
                </div>
                <x-card.description>
                    {{ $card_description }}
                </x-card.description>
            </x-card.header>
            <form action="{{ $form_action }}" method="post" enctype="multipart/form-data" novalidate>
                @method($method)
                @csrf
                <div class="flex flex-col gap-2">
                    <x-input-label for="logo">
                        Logo
                    </x-input-label>
                    <x-text-input name="logo" id="logo" type="file" class="py-2" required></x-text-input>
                    <x-input-error :messages="$errors->get('logo')" />

                    <x-input-label for="name">
                        Name
                    </x-input-label>
                    <x-text-input name="name" id="name" type="text" value="{{ old('name', $store->name) }}"
                        autofocus required></x-text-input>
                    <x-input-error :messages="$errors->get('name')" />

                    <x-input-label for="description">
                        Description
                    </x-input-label>
                    <textarea name="description" id="description" rows="4" cols="50" required>{{ old('description', $store->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" />

                    <x-primary-button class="w-max" type="submit">
                        {{ $submit_text }}
                    </x-primary-button>
                </div>
            </form>
        </x-card>
    </x-container>
</x-app-layout>
