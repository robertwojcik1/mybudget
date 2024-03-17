<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('root');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add-income', [IncomeController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('addIncome');

Route::post('/add-income', [IncomeController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('storeIncome');

Route::get('/add-expense', [ExpenseController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('addExpense');

Route::post('/add-expense', [ExpenseController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('storeExpense');

Route::get('/balance', [BalanceController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('balance');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
