<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'employee_name',
        'photo',
        'start_date',
        'end_date',
        'total_days',
        'total_hours',
        'invoice_amount',
        'status',
    ];

   // app/Models/Payroll.php
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
