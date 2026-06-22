@extends('layouts.app')

@section('title', 'Nexa - Edit Time Off')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header Page -->
    <div class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Edit Time Off Request</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Modify time off details and status for selected employee</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('timeoffs.update', $timeoff->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Employee Dropdown -->
            <div>
                <x-input-label for="employee_id" :value="__('Select Employee')" />
                <select name="employee_id" id="employee_id" class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $employee->id == $timeoff->employee_id ? 'selected' : '' }}>
                            {{ $employee->employee_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date Range -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="leave_form" :value="__('Leave From')" />
                    <x-text-input type="date" name="leave_form" id="leave_form" value="{{ $timeoff->leave_form }}" />
                </div>
                <div>
                    <x-input-label for="leave_to" :value="__('Leave To')" />
                    <x-text-input type="date" name="leave_to" id="leave_to" value="{{ $timeoff->leave_to }}" />
                </div>
            </div>

            <!-- Total Days -->
            <div>
                <x-input-label for="days" :value="__('Total Days')" />
                <x-text-input type="number" name="days" id="days" value="{{ $timeoff->days }}" />
            </div>

            <!-- Leave Type -->
            <div>
                <x-input-label for="leave_type" :value="__('Leave Type')" />
                <x-text-input type="text" name="leave_type" id="leave_type" value="{{ $timeoff->leave_type }}" />
            </div>

            <!-- Status -->
            <div>
                <x-input-label for="status" :value="__('Status')" />
                <select name="status" id="status" class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    <option value="approved" {{ $timeoff->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="pending" {{ $timeoff->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="rejected" {{ $timeoff->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a href="{{ route('timeoffs.index') }}" class="px-5 py-3 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 transition-colors">
                    Cancel
                </a>
                <x-primary-button class="w-auto">
                    Update Request
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
