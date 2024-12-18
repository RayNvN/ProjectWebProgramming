@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Create Time Off</h1>

    <form method="POST" action="{{ route('timeoffs.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee</label>
            <select class="form-select" name="employee_id" id="employee_id" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" data-name="{{ $employee->employee_name }}">{{ $employee->employee_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Employee Name (This will be automatically filled based on the selected employee) -->
        <div class="mb-3">
            <label for="employee_name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" name="employee_name" id="employee_name" readonly>
        </div>

        <div class="mb-3">
            <label for="leave_type" class="form-label">Leave Type</label>
            <select class="form-select" name="leave_type" required>
                <option value="">Select Leave Type</option>
                <option value="Sick Leave">Sick Leave</option>
                <option value="Vacation">Vacation</option>
                <option value="Emergency Leave">Emergency Leave</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="leave_form" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="leave_form" required>
        </div>

        <div class="mb-3">
            <label for="leave_to" class="form-label">End Date</label>
            <input type="date" class="form-control" name="leave_to" required>
        </div>

        <div class="mb-3">
            <label for="days" class="form-label">Total Days</label>
            <input type="number" class="form-control" name="days" required>
        </div>

        <div class="mb-3">
            
            <!-- Hapus status dari form ini, karena status di-set otomatis ke Pending -->
            <input type="hidden" name="status" value="Pending"> <!-- Menetapkan status default menjadi Pending -->
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.getElementById('employee_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('employee_name').value = selectedOption.getAttribute('data-name');
    });
</script>

@endsection
