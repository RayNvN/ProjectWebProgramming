<!-- resources/views/employees/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_name">Employee Name</label>
            <input type="text" class="form-control" id="employee_name" name="employee_name" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" required>
        </div>
        <div class="form-group">
            <label for="contract_type">Contract Type</label>
            <input type="text" class="form-control" id="contract_type" name="contract_type" required>
        </div>
        <div class="form-group">
            <label for="attendance">Attendance</label>
            <select class="form-control" id="attendance" name="attendance" required>
                <option value="1">Present</option>
                <option value="0">Absent</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Employee</button>
    </form>

</div>
@endsection
