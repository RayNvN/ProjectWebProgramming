<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function create()
    {
        $employees = Employee::all(); // Ambil semua employee
        return view('payroll.create', compact('employees'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'employee_name' => 'required|string',
            'photo' => 'required|image',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_days' => 'required|integer',
            'total_hours' => 'required|integer',
            'invoice_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Payroll::create([
            'employee_id' => $request->employee_id,
            'employee_name' => $request->employee_name,
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

    public function edit($id)
    {
        $payroll = Payroll::findOrFail($id);
        $employees = Employee::all(); // Ambil semua employee untuk dropdown
        return view('payroll.edit', compact('payroll', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'employee_name' => 'required|string',
            'photo' => 'nullable|image',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_days' => 'required|integer',
            'total_hours' => 'required|integer',
            'invoice_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $payroll = Payroll::findOrFail($id);

        // Jika ada file foto baru, upload dan ganti
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $payroll->photo = $photoPath;
        }

        $payroll->update([
            'employee_id' => $validated['employee_id'],
            'employee_name' => $validated['employee_name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_days' => $validated['total_days'],
            'total_hours' => $validated['total_hours'],
            'invoice_amount' => $validated['invoice_amount'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('payroll.index')->with('success', 'Payroll updated successfully.');
    }

    public function pay($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->update(['status' => 'Paid']);

        return redirect()->route('payroll.index')->with('success', 'Payroll marked as Paid.');
    }

}
