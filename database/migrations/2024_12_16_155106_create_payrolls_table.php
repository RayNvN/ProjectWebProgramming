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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id'); // kolom untuk relasi ke employee
            $table->string('employee_name');            // kolom untuk nama employee (bisa ambil dari employee)
            $table->string('photo');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_days');
            $table->integer('total_hours');
            $table->decimal('invoice_amount', 10, 2);
            $table->enum('status', ['Paid', 'Unpaid']);
            $table->timestamps();

            // Menambahkan foreign key untuk relasi ke employee
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
