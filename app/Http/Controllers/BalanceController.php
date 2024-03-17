<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::getUser()->getAuthIdentifier();

        $incomes = Income::query()->leftJoin('incomes_category_assigned_to_users', 'incomes.income_category_assigned_to_user_id', '=', 'incomes_category_assigned_to_users.id')
            ->select('incomes.date_of_income', 'incomes.amount', 'incomes_category_assigned_to_users.name', 'incomes.income_comment')
            ->where('incomes.user_id', $userId)->get();

        $expenses = Expense::query()->leftJoin('expenses_category_assigned_to_users', 'expenses.expense_category_assigned_to_user_id', '=', 'expenses_category_assigned_to_users.id')
            ->leftJoin('payment_methods_assigned_to_users', 'expenses.payment_method_assigned_to_user_id', '=', 'payment_methods_assigned_to_users.id')
            ->select('expenses.date_of_expense', 'expenses.amount', 'expenses_category_assigned_to_users.name as categoryName', 'expenses.expense_comment', 'payment_methods_assigned_to_users.name as paymentName')
            ->where('expenses.user_id', $userId)->get();

        return view('balance', ['incomes' => $incomes, 'expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
