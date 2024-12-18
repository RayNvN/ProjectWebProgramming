<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'phone_number',
        'department',
        'job_title',
        'contract_type',
        'attendance',
    ];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employee_id');
    }

    public function timeoffs()
    {
        return $this->hasMany(TimeOff::class, 'employee_id');
    }
}
