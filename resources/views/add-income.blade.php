<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj przychód') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Category -->
                <div class="mb-4">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-300">Kategoria</label>
                    <select id="category" class="block rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700">
                        @foreach( $categories as $category )
                        <option >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
{{--                Amount--}}
                <div class="mb-4">
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-300">Kwota</label>
                    <input type="number" class="block rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700" id="amount" name="amount" step="1" min="0" placeholder="0.00" />
                </div>
{{--                Date--}}
                <div class="mb-4">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-300">Data</label>
                    <input type="date" id="date" name="date" class="rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700"/>
                </div>
{{--                Comment--}}
                <div class="mb-4">
                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-300">Komentarz</label>
                    <textarea id="comment" name="comment" rows="3" maxlength="100" class="rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700 resize-none"></textarea>
                </div>
{{--                Button               --}}
                <div>
                    <x-primary-button class="ms-3">
                        Dodaj przychód
                    </x-primary-button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </x-slot>
    <script>
        const textarea = document.getElementById('comment');

        textarea.addEventListener('mousedown', (event) => {
            if (event.target.classList.contains('resize-handle')) {
                event.preventDefault();
            }
        });
    </script>
</x-app-layout>
