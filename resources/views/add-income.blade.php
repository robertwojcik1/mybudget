<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj przychód') }}
        </h2>
    </x-slot>
    <x-slot name="main">
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('storeIncome') }}">
                @csrf

                <!-- Category -->
                <div class="mb-4">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-300">Kategoria</label>
                    <select id="category" name="category" required class="block rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700">
                        @foreach( $categories as $category )
                        <option value="{{ strval($category->id) }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
{{--                Amount--}}
                <div class="mb-4">
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-300">Kwota</label>
                    <input type="number" required pattern="^[0-9]+(\.[0-9]{1,2})?$" class="block rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700" id="amount" name="amount" step="1" min="0" max="1000000" placeholder="0.00" />
                </div>
                <div class="mb-4">
                    <span id="amountError"class="error-message text-red-600" hidden></span>
                </div>
{{--                Date--}}
                <div class="mb-4">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-300">Data</label>
                    <input type="date" id="date" required name="date" class="rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700"/>
                </div>
                <div class="mb-4">
                    <span id="dateError"class="error-message text-red-600" hidden></span>
                </div>
{{--                Comment--}}
                <div class="mb-4">
                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-300">Komentarz</label>
                    <input type="text" id="comment" name="comment" maxlength="100" class="rounded mt-1 w-full dark:bg-gray-900 text-gray-300 focus:border-indigo-700"/>
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
    <x-slot name="script">
        <script>
            const amountErrorElement = document.querySelector("#amountError");
            const dateErrorElement = document.querySelector("#dateError");
            const amountInput = document.querySelector("#amount");
            const dateField = document.querySelector("#date");

            dateField.addEventListener("change", () => {
                validateDate(dateField);
            });

            amountInput.addEventListener('input', () => {
                const isValid = validateNumberInput(amountInput.value);

                if(isValid) {
                    amountErrorElement.setAttribute("hidden", "hidden");
                    amountErrorElement.textContent = "";
                } else {
                    amountErrorElement.textContent = "Wprowadzona wartość jest nieprawidłowa";
                    amountErrorElement.removeAttribute("hidden");
                }
            });

            function validateNumberInput(input) {
                const regex = /^(?:\d{1,7}(?:\.|\,)?\d{0,2})?$/;

                if (isNaN(input) || input > 1000000 || !regex.test(input)) {
                    return false;
                } else {
                    return true;
                }
            }

            function validateDate(dateInput) {
                const today = new Date();
                const inputDate = new Date(dateInput.value);

                if (inputDate > today) {
                    dateErrorElement.textContent = "Wprowadzona data nie może być późniejsza niż aktualna";
                    dateErrorElement.removeAttribute("hidden");
                } else {
                    dateErrorElement.setAttribute("hidden", "hidden");
                    dateErrorElement.textContent = "";
                }
            }
        </script>
    </x-slot>
</x-app-layout>
