<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'income_category_assigned_to_user_id',
        'amount',
        'date_of_income',
        'income_comment'
    ];

//    public function incomesCategory()
//    {
//        return $this->belongsTo(IncomesCategoryAssignedToUsers::class, 'user_id', 'user_id');
//    }
}
