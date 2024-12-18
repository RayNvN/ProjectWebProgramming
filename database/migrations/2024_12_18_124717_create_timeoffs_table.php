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
        Schema::create('timeoffs', function (Blueprint $table) {
            $table->id();  // primary key
            $table->unsignedBigInteger('employee_id');
            $table->string('employee_name'); // Employee Name
            $table->string('leave_type'); // Leave Type
            $table->text('leave_form'); // Leave Form (misalnya form yang diisi atau alasan)
            $table->date('leave_to'); // Leave To (tanggal akhir cuti)
            $table->integer('days'); // Days (jumlah hari cuti)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status
            $table->timestamps(); // created_at, updated_at

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeoffs');
    }
};
