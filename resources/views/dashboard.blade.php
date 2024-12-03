<x-app-layout>

    @slot('title', 'Dashboard');
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-container>
        {{ __("You're logged in!") }}
    </x-container>
</x-app-layout>
