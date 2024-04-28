<?php

use Carbon\Carbon;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('appointment_id')->uniqid();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->double('down_payment_amount')->nullable();
            $table->double('loan_amount')->nullable();
            $table->boolean('promotion_eligibility')->default(true);
            $table->boolean('purchase_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
