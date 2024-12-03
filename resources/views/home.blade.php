<x-app-layout>
    @slot('title', 'Home');
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-container>
        {{ __('Homepage') }}
    </x-container>
</x-app-layout>
