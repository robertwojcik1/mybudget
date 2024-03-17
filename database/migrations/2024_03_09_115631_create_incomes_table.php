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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('income_category_assigned_to_user_id');
            $table->decimal('amount', 8, 2, true);
            $table->date('date_of_income');
            $table->string('income_comment', 100);
            $table->timestamps();

//            $table->foreign('income_category_assigned_to_user_id')->references('id')
//                ->on('incomes_category_assigned_to_users');
//            $table->foreignId('income_category_assigned_to_user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
