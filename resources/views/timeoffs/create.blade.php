@extends('layouts.app')

@section('title', 'Nexa - Request Time Off')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header Page -->
    <div class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Create Time Off Request</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Submit a leave or time off request on behalf of an employee</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-sm">
        <form method="POST" action="{{ route('timeoffs.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Employee Dropdown -->
            <div>
                <x-input-label for="employee_id" :value="__('Select Employee')" />
                <select name="employee_id" id="employee_id" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" data-name="{{ $employee->employee_name }}">{{ $employee->employee_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Employee Name -->
            <div>
                <x-input-label for="employee_name" :value="__('Employee Name')" />
                <x-text-input type="text" name="employee_name" id="employee_name" readonly placeholder="Automatic fill" />
            </div>

            <!-- Leave Type -->
            <div>
                <x-input-label for="leave_type" :value="__('Leave Type')" />
                <select name="leave_type" id="leave_type" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    <option value="">Select Leave Type</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Vacation">Vacation</option>
                    <option value="Emergency Leave">Emergency Leave</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Date Range -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="leave_form" :value="__('Start Date')" />
                    <x-text-input type="date" name="leave_form" id="leave_form" required />
                </div>
                <div>
                    <x-input-label for="leave_to" :value="__('End Date')" />
                    <x-text-input type="date" name="leave_to" id="leave_to" required />
                </div>
            </div>

            <!-- Total Days -->
            <div>
                <x-input-label for="days" :value="__('Total Days')" />
                <x-text-input type="number" name="days" id="days" placeholder="e.g. 5" required />
            </div>

            <!-- Hidden Status -->
            <input type="hidden" name="status" value="Pending">

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a href="{{ route('timeoffs.index') }}" class="px-5 py-3 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 transition-colors">
                    Cancel
                </a>
                <x-primary-button class="w-auto">
                    Submit Request
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
