<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id()->unsigned()->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('expense_category_assigned_to_user_id');
            $table->unsignedInteger('payment_method_assigned_to_user_id');
            $table->unsignedDecimal('amount')->default('0.00');
            $table->date('date_of_expense');
            $table->string('expense_comment', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
