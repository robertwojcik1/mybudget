<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\IncomesCategoryAssignedToUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
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

        $categories = IncomesCategoryAssignedToUsers::query()->select('name', 'id')->where('user_id', $userId)->get();

        return view('add-income', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::getUser()->getAuthIdentifier();

        $income = Income::create([
            'user_id' => $userId,
            'income_category_assigned_to_user_id' => intval($request->category),
            'amount' => $request->amount,
            'date_of_income' => $request->date,
            'income_comment' => $request->comment
        ]);

        if( $income->id ) {
            return redirect('dashboard')->with('success', 'Przychód pomyślnie zapisany');
        } else {
            return redirect('dashboard')->with('error', 'Nie udało się zapisać przychodu');
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
