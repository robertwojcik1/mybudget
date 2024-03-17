<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpensesCategoryAssignedToUsers;
use App\Models\Income;
use App\Models\IncomesCategoryAssignedToUsers;
use App\Models\PaymentMethodsAssignedToUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::getUser()->getAuthIdentifier();

        $categories = ExpensesCategoryAssignedToUsers::query()->select('name', 'id')->where('user_id', $userId)->get();

        $paymentMethods = PaymentMethodsAssignedToUsers::query()->select('name', 'id')->where('user_id', $userId)->get();

        return view('add-expense', ['categories' => $categories, 'paymentMethods' => $paymentMethods]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::getUser()->getAuthIdentifier();

        $expense = Expense::create([
            'user_id' => $userId,
            'expense_category_assigned_to_user_id' => intval($request->category),
            'payment_method_assigned_to_user_id' => $request->paymentMethod,
            'amount' => $request->amount,
            'date_of_expense' => $request->date,
            'expense_comment' => $request->comment
        ]);

        if( $expense->id ) {
            return redirect('dashboard')->with('success', 'Wydatek pomyślnie zapisany');
        } else {
            return redirect('dashboard')->with('error', 'Nie udało się zapisać wydatku');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
