<?php

namespace App\Http\Controllers;

use App\Models\ExpensesCategoryAssignedToUsers;
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

        $categories = ExpensesCategoryAssignedToUsers::query()->select('name')->where('user_id', $userId)->get();

        $paymentMethods = PaymentMethodsAssignedToUsers::query()->select('name')->where('user_id', $userId)->get();

        return view('add-expense', ['categories' => $categories, 'paymentMethods' => $paymentMethods]);
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
