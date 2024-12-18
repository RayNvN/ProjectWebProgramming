<form method="POST" action="{{ route('payroll.update', $payroll->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Employee Dropdown -->
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee</label>
        <select class="form-select" name="employee_id" id="employee_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}"
                    data-name="{{ $employee->employee_name }}"
                    {{ $employee->id == $payroll->employee_id ? 'selected' : '' }}>
                    {{ $employee->employee_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Employee Name -->
    <div class="mb-3">
        <label for="employee_name" class="form-label">Employee Name</label>
        <input type="text" class="form-control" name="employee_name" id="employee_name" value="{{ $payroll->employee_name }}" readonly>
    </div>

    <!-- Other Fields -->
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control" name="start_date" value="{{ $payroll->start_date }}" required>
    </div>

    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" class="form-control" name="end_date" value="{{ $payroll->end_date }}" required>
    </div>

    <div class="mb-3">
        <label for="total_days" class="form-label">Total Days</label>
        <input type="number" class="form-control" name="total_days" value="{{ $payroll->total_days }}" required>
    </div>

    <div class="mb-3">
        <label for="total_hours" class="form-label">Total Hours</label>
        <input type="number" class="form-control" name="total_hours" value="{{ $payroll->total_hours }}" required>
    </div>

    <div class="mb-3">
        <label for="invoice_amount" class="form-label">Invoice Amount</label>
        <input type="number" step="0.01" class="form-control" name="invoice_amount" value="{{ $payroll->invoice_amount }}" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" name="status" required>
            <option value="Paid" {{ $payroll->status == 'Paid' ? 'selected' : '' }}>Paid</option>
            <option value="Unpaid" {{ $payroll->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" name="photo" accept="image/*">
        <small>Leave blank to keep the current photo.</small>
    </div>

    <button type="submit" class="btn btn-primary">Update Payroll</button>
</form>

<script>
    document.getElementById('employee_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('employee_name').value = selectedOption.getAttribute('data-name');
    });
</script>
