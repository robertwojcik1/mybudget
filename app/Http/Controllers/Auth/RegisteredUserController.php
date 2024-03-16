<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ExpensesCategoryAssignedToUsers;
use App\Models\ExpensesCategoryDefault;
use App\Models\IncomesCategoryAssignedToUsers;
use App\Models\IncomesCategoryDefault;
use App\Models\PaymentMethodsAssignedToUsers;
use App\Models\PaymentMethodsDefault;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $this->assignDefaultPaymentsMethods( $user->id );

        $this->assignDefaultExpenseCategories( $user->id );

        $this->assignDefaultIncomeCategories( $user->id );

        return redirect(RouteServiceProvider::HOME);
    }

    private function assignDefaultPaymentsMethods( $userId ) {
        $paymentMethodsAssignedToUser = PaymentMethodsDefault::all();

        foreach ($paymentMethodsAssignedToUser as $method) {
            $paymentMethod = new PaymentMethodsAssignedToUsers();
            $paymentMethod->user_id = $userId;
            $paymentMethod->name = $method->name;
            $paymentMethod->save();
        }
    }

    private function assignDefaultExpenseCategories( $userId ) {
        $expensesCategoryAssignedToUser = ExpensesCategoryDefault::all();

        foreach ($expensesCategoryAssignedToUser as $category) {
            $expenseCategory = new ExpensesCategoryAssignedToUsers();
            $expenseCategory->user_id = $userId;
            $expenseCategory->name = $category->name;
            $expenseCategory->save();
        }
    }

    private function assignDefaultIncomeCategories( $userId ) {
        $incomesCategoryAssignedToUser = IncomesCategoryDefault::all();

        foreach ($incomesCategoryAssignedToUser as $category) {
            $incomeCategory = new IncomesCategoryAssignedToUsers();
            $incomeCategory->user_id = $userId;
            $incomeCategory->name = $category->name;
            $incomeCategory->save();
        }
    }
}
