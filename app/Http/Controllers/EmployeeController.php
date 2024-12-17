<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Pastikan model Employee sudah diimport
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    // Menampilkan daftar employee
    public function index()
    {
        $employees = Employee::paginate(10);  // Menampilkan 10 data per halaman
        return view('employees.index', compact('employees'));
    }


    // Form untuk menambah employee
    public function create()
    {
        return view('employees.create');
    }

    // Menyimpan data employee ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'contract_type' => 'required|string|max:50',
            'attendance' => 'required|boolean',
        ]);

        Employee::create($validatedData);

        return redirect()->route('employees.index');
    }

    // Menampilkan detail employee
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }
}
