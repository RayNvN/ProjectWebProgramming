@extends('layouts.app')

@section('title', 'Nexa - Add Employee')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header Page -->
    <div class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Add New Employee</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Fill in the form to register a new employee profile</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('employees.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Employee Name -->
            <div>
                <x-input-label for="employee_name" :value="__('Employee Name')" />
                <x-text-input id="employee_name" type="text" name="employee_name" required placeholder="e.g. Jane Doe" />
            </div>

            <!-- Phone Number -->
            <div>
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" type="text" name="phone_number" required placeholder="e.g. +62 812-3456-7890" />
            </div>

            <!-- Department -->
            <div>
                <x-input-label for="department" :value="__('Department')" />
                <x-text-input id="department" type="text" name="department" required placeholder="e.g. Human Resources" />
            </div>

            <!-- Job Title -->
            <div>
                <x-input-label for="job_title" :value="__('Job Title')" />
                <x-text-input id="job_title" type="text" name="job_title" required placeholder="e.g. HR Generalist" />
            </div>

            <!-- Contract Type -->
            <div>
                <x-input-label for="contract_type" :value="__('Contract Type')" />
                <x-text-input id="contract_type" type="text" name="contract_type" required placeholder="e.g. Full-Time, Contract" />
            </div>

            <!-- Attendance -->
            <div>
                <x-input-label for="attendance" :value="__('Attendance')" />
                <select id="attendance" name="attendance" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    <option value="1">Present</option>
                    <option value="0">Absent</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a href="{{ route('employees.index') }}" class="px-5 py-3 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 transition-colors">
                    Cancel
                </a>
                <x-primary-button class="w-auto">
                    Save Employee
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection
