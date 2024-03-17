<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Strona główna') }}
        </h2>
    </x-slot>
    <x-slot name="main">
        @if (session()->has('flash.message'))
            <div class="py-12 text-gray-300">
                <p >FLASH MESSAGE</p>
{{--            <p class="alert alert-{{ session()->get('flash.type') }}">{{ session()->get('flash.message') }}</p>--}}
            </div>
        @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Jesteś zalogowany") }}
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
