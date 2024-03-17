<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'expense_category_assigned_to_user_id',
        'payment_method_assigned_to_user_id',
        'amount',
        'date_of_expense',
        'expense_comment'
    ];
}
