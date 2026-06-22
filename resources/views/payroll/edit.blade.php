@extends('layouts.app')

@section('title', 'Nexa - Edit Payroll')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header Page -->
    <div class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Edit Payroll Invoice</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Modify invoice details for selected employee payroll</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-sm">
        <form method="POST" action="{{ route('payroll.update', $payroll->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Employee Dropdown -->
            <div>
                <x-input-label for="employee_id" :value="__('Select Employee')" />
                <select name="employee_id" id="employee_id" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
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
            <div>
                <x-input-label for="employee_name" :value="__('Employee Name')" />
                <x-text-input type="text" name="employee_name" id="employee_name" value="{{ $payroll->employee_name }}" readonly />
            </div>

            <!-- Photo Upload -->
            <div>
                <x-input-label for="photo" :value="__('Upload Receipt / Photo (Optional)')" />
                <input type="file" name="photo" id="photo" accept="image/*" class="w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 dark:file:bg-indigo-950/40 dark:file:text-indigo-400 hover:file:bg-indigo-100 transition-all cursor-pointer border border-slate-200 dark:border-slate-800 rounded-xl p-2 bg-slate-50 dark:bg-slate-950">
                <p class="text-xs text-slate-400 dark:text-slate-500 mt-2">Leave blank to keep the current photo.</p>
            </div>

            <!-- Date Range -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="start_date" :value="__('Start Date')" />
                    <x-text-input type="date" name="start_date" id="start_date" value="{{ $payroll->start_date }}" required />
                </div>
                <div>
                    <x-input-label for="end_date" :value="__('End Date')" />
                    <x-text-input type="date" name="end_date" id="end_date" value="{{ $payroll->end_date }}" required />
                </div>
            </div>

            <!-- Total Days & Hours -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="total_days" :value="__('Total Days')" />
                    <x-text-input type="number" name="total_days" id="total_days" value="{{ $payroll->total_days }}" required />
                </div>
                <div>
                    <x-input-label for="total_hours" :value="__('Total Hours')" />
                    <x-text-input type="number" name="total_hours" id="total_hours" value="{{ $payroll->total_hours }}" required />
                </div>
            </div>

            <!-- Invoice Amount -->
            <div>
                <x-input-label for="invoice_amount" :value="__('Invoice Amount ($)')" />
                <x-text-input type="number" step="0.01" name="invoice_amount" id="invoice_amount" value="{{ $payroll->invoice_amount }}" required />
            </div>

            <!-- Status -->
            <div>
                <x-input-label for="status" :value="__('Status')" />
                <select name="status" id="status" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    <option value="Paid" {{ $payroll->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Unpaid" {{ $payroll->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a href="{{ route('payroll.index') }}" class="px-5 py-3 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 transition-colors">
                    Cancel
                </a>
                <x-primary-button class="w-auto">
                    Update Payroll
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('employee_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('employee_name').value = selectedOption.getAttribute('data-name') || '';
        });
    });
</script>
@endsection
