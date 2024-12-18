<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Import model Employee
use App\Models\TimeOff;  // Import model TimeOff
use Illuminate\Http\Request;

class TimeOffController extends Controller
{
    // Menampilkan form create
    public function create()
    {
        $employees = Employee::all(); // Ambil semua data karyawan
        return view('timeoffs.create', compact('employees'));
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required',
            'leave_form' => 'required|date',
            'leave_to' => 'required|date',
            'days' => 'required|numeric',
        ]);

        // Menambahkan status default "Pending"
        $timeoff = new TimeOff();
        $timeoff->employee_id = $request->employee_id;
        $timeoff->leave_type = $request->leave_type;
        $timeoff->leave_form = $request->leave_form;
        $timeoff->leave_to = $request->leave_to;
        $timeoff->days = $request->days;
        $timeoff->status = 'Pending'; // Status otomatis set ke Pending
        $timeoff->employee_name = Employee::find($request->employee_id)->employee_name;
        $timeoff->save();

        return redirect()->route('timeoffs.index')->with('success', 'Time Off request created successfully.');
    }


    public function approve($id)
    {
        $timeoff = TimeOff::findOrFail($id);
        $timeoff->status = 'Approved'; // Mengubah status menjadi Approved
        $timeoff->save();

        return redirect()->route('timeoffs.index')->with('success', 'Time Off approved successfully.');
    }

    public function reject($id)
    {
        $timeoff = TimeOff::findOrFail($id);
        $timeoff->status = 'Rejected'; // Mengubah status menjadi Rejected
        $timeoff->save();

        return redirect()->route('timeoffs.index')->with('success', 'Time Off rejected successfully.');
    }



    // Menampilkan daftar time off
    public function index()
    {
        // Mengambil semua data timeoff (opsional dengan relasi employee jika ada)
        $timeoffs = TimeOff::all();

        return view('timeoffs.index', compact('timeoffs'));
    }

    // app/Http/Controllers/TimeOffController.php
    public function edit($id)
    {
        $timeoff = Timeoff::findOrFail($id);
        $employees = Employee::all();  // Mengambil data employees
        return view('timeoffs.edit', compact('timeoff', 'employees'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_form' => 'required|date',
            'leave_to' => 'required|date',
            'days' => 'required|numeric',
            'leave_type' => 'required|string',
            'status' => 'required|string',
        ]);

        // Update data timeoff
        $timeoff = Timeoff::findOrFail($id);
        $timeoff->update([
            'employee_id' => $request->employee_id,
            'leave_form' => $request->leave_form,
            'leave_to' => $request->leave_to,
            'days' => $request->days,
            'leave_type' => $request->leave_type,
            'status' => $request->status,
        ]);

        // Redirect setelah update
        return redirect()->route('timeoffs.index')->with('success', 'Time off updated successfully');
    }

    public function destroy($id)
    {
        $timeoff = Timeoff::findOrFail($id);
        $timeoff->delete();

        return redirect()->route('timeoffs.index')->with('success', 'Time off deleted successfully');
    }


}
