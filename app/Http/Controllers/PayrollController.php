<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function create()
    {
        $employees = Employee::all();

        return view('payroll.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'photo' => 'required|image',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_days' => 'required|integer',
            'total_hours' => 'required|integer',
            'invoice_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Get employee name based on ID
        $employee = Employee::findOrFail($request->employee_id);

        // Save payroll record
        Payroll::create([
            'employee_id' => $employee->id,
            'employee_name' => $employee->name, // Auto-fill name
            'photo' => $request->file('photo')->store('photos', 'public'),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_days' => $validated['total_days'],
            'total_hours' => $validated['total_hours'],
            'invoice_amount' => $validated['invoice_amount'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('payroll.index')->with('success', 'Payroll created successfully.');
    }




    public function index()
    {
        // Mengambil data payroll dan relasi employee
        $payrolls = Payroll::with('employee')->get();

        return view('payroll.index', compact('payrolls'));
    }


}
