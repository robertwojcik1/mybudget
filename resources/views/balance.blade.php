<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Przeglądaj bilans') }}
        </h2>
    </x-slot>

    <x-slot name="main">
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 flex flex-row">

                <div class="w-full sm:max-w-md mt-4 mx-4 px-6 py-4 bg-white dark:bg-gray-800 text-gray-300 shadow-md overflow-hidden sm:rounded-lg">
                    <table class="table-fixed border-collapse border border-slate-500 w-full">
                        <thead class="text-justify">
                        PRZYCHODY - ZESTAWIENIE SZCZEGÓŁOWE
                        </thead>
                        <thead>
                        <tr>
                            <th class="border border-slate-600">#</th>
                            <th class="border border-slate-600">Data</th>
                            <th class="border border-slate-600">Kwota</th>
                            <th class="border border-slate-600">Kategoria</th>
                            <th class="border border-slate-600">Komentarz</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($incomes as $income)
                        <tr>
                            <td class="border border-slate-700 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-slate-700 text-center">{{ $income->date_of_income }}</td>
                            <td class="border border-slate-700 text-center">{{ $income->amount }}</td>
                            <td class="border border-slate-700 text-center">{{ $income->name }}</td>
                            <td class="border border-slate-700 text-center">{{ $income->income_comment }}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="w-full sm:max-w-md mt-4 mx-4 px-6 py-4 bg-white dark:bg-gray-800 text-gray-300 shadow-md overflow-hidden sm:rounded-lg">
                    <table class="table-fixed border-collapse border border-slate-500 w-full">
                        <thead class="text-justify">
                        WYDATKI - ZESTAWIENIE SZCZEGÓŁOWE
                        </thead>
                        <thead>
                        <tr>
                            <th class="border border-slate-600">#</th>
                            <th class="border border-slate-600">Data</th>
                            <th class="border border-slate-600">Kwota</th>
                            <th class="border border-slate-600">Sposób płatności</th>
                            <th class="border border-slate-600">Kategoria</th>
                            <th class="border border-slate-600">Komentarz</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expenses as $expense)
                            <tr>
                                <td class="border border-slate-700 text-center">{{ $loop->iteration }}</td>
                                <td class="border border-slate-700 text-center">{{ $expense->date_of_expense }}</td>
                                <td class="border border-slate-700 text-center">{{ $expense->amount }}</td>
                                <td class="border border-slate-700 text-center">{{ $expense->paymentName }}</td>
                                <td class="border border-slate-700 text-center">{{ $expense->categoryName }}</td>
                                <td class="border border-slate-700 text-center">{{ $expense->expense_comment }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </x-slot>
</x-app-layout>
