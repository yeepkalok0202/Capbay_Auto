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
        Schema::create('test_drive_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_id')->unique();
            $table->timestamp('appointment_date');
            $table->boolean('appointment_status')->default(true);
            $table->timestamp('approval_date')->default(Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_drive_appointments');
    }
};
