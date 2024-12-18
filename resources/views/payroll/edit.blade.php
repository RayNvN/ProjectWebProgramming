<form method="POST" action="{{ route('payroll.update', $payroll->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Employee Dropdown -->
    <div class="mb-3">
        <label for="employee_id" class="form-label">Employee</label>
        <select class="form-select mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="employee_id" id="employee_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}"
                    data-name="{{ $employee->employee_name }}"
                    {{ $employee->id == $payroll->employee_id ? 'selected' : '' }}>
                    {{ $employee->employee_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Employee Name (Auto-filled) -->
    <div class="mb-3">
        <label for="employee_name" class="form-label">Employee Name</label>
        <input type="text" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="employee_name" id="employee_name" value="{{ $payroll->employee_name }}" readonly>
    </div>

    <!-- Photo Upload -->
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="photo" accept="image/*">
        <small class="text-gray-500">Leave blank to keep the current photo.</small>
    </div>

    <!-- Start Date -->
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="start_date" value="{{ $payroll->start_date }}" required>
    </div>

    <!-- End Date -->
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="end_date" value="{{ $payroll->end_date }}" required>
    </div>

    <!-- Total Days -->
    <div class="mb-3">
        <label for="total_days" class="form-label">Total Days</label>
        <input type="number" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="total_days" value="{{ $payroll->total_days }}" required>
    </div>

    <!-- Total Hours -->
    <div class="mb-3">
        <label for="total_hours" class="form-label">Total Hours</label>
        <input type="number" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="total_hours" value="{{ $payroll->total_hours }}" required>
    </div>

    <!-- Invoice Amount -->
    <div class="mb-3">
        <label for="invoice_amount" class="form-label">Invoice Amount</label>
        <input type="number" step="0.01" class="form-control mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="invoice_amount" value="{{ $payroll->invoice_amount }}" required>
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="status" required>
            <option value="Paid" {{ $payroll->status == 'Paid' ? 'selected' : '' }}>Paid</option>
            <option value="Unpaid" {{ $payroll->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="mb-6">
        <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Update Payroll
        </button>
    </div>
</form>

<script>
    document.getElementById('employee_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('employee_name').value = selectedOption.getAttribute('data-name');
    });
</script>
