<!-- resources/views/payroll/create.blade.php -->

<form method="POST" action="{{ route('payroll.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Employee Dropdown -->
    <div class="form-select" name="employee_id" required>
        <option value="">Select Employee</option>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
        @endforeach
    </div>

    <!-- Photo Upload -->
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" name="photo" accept="image/*" required>
    </div>

    <!-- Start Date -->
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control" name="start_date" required>
    </div>

    <!-- End Date -->
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" class="form-control" name="end_date" required>
    </div>

    <!-- Total Days -->
    <div class="mb-3">
        <label for="total_days" class="form-label">Total Days</label>
        <input type="number" class="form-control" name="total_days" placeholder="Enter Total Days" required>
    </div>

    <!-- Total Hours -->
    <div class="mb-3">
        <label for="total_hours" class="form-label">Total Hours</label>
        <input type="number" class="form-control" name="total_hours" placeholder="Enter Total Hours" required>
    </div>

    <!-- Invoice Amount -->
    <div class="mb-3">
        <label for="invoice_amount" class="form-label">Invoice Amount</label>
        <input type="number" step="0.01" class="form-control" name="invoice_amount" placeholder="Enter Invoice Amount" required>
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" name="status" required>
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
        </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Create Payroll</button>
</form>