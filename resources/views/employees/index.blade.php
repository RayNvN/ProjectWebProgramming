@extends('layouts.app')

@section('title', 'Nexa - Manage Employees')

@section('content')
<div class="space-y-6" x-data="{ selectedEmployee: null }">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">Manage Employees</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">View and manage employee files and information</p>
        </div>
        <a href="{{ route('employees.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md transition-all duration-200">
            Add Employee
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-400 text-xs font-bold uppercase tracking-wider border-b border-slate-200 dark:border-slate-800">
                        <th class="px-6 py-4">Employee Name</th>
                        <th class="px-6 py-4">Phone Number</th>
                        <th class="px-6 py-4">Department</th>
                        <th class="px-6 py-4">Job Title</th>
                        <th class="px-6 py-4">Contract Type</th>
                        <th class="px-6 py-4">Attendance</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800/80 text-sm">
                    @foreach($employees as $employee)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900 dark:text-white">{{ $employee->employee_name }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $employee->phone_number }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $employee->department }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $employee->job_title }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-55 dark:bg-indigo-950/50 text-indigo-700 dark:text-indigo-400 border border-indigo-200/50 dark:border-indigo-800/30">
                                    {{ $employee->contract_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 border border-emerald-200/50 dark:border-emerald-800/30">
                                    {{ $employee->attendance }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button 
                                    @click="selectedEmployee = {{ json_encode($employee) }}" 
                                    class="inline-flex items-center justify-center px-3.5 py-1.5 text-xs font-bold text-indigo-600 hover:text-white dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-950/50 hover:bg-indigo-600 dark:hover:bg-indigo-600 border border-transparent rounded-lg transition-all"
                                >
                                    See Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($employees->hasPages())
            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950/40">
                {{ $employees->links() }}
            </div>
        @endif
    </div>

    <!-- Modal for Employee Detail using Alpine.js -->
    <div 
        x-show="selectedEmployee !== null" 
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/50 backdrop-blur-sm"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
    >
        <div 
            @click.away="selectedEmployee = null" 
            class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 w-full max-w-md rounded-2xl shadow-xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="scale-95 translate-y-4"
            x-transition:enter-end="scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="scale-100 translate-y-0"
            x-transition:leave-end="scale-95 translate-y-4"
        >
            <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-800 flex justify-between items-center">
                <h3 class="font-bold text-lg text-slate-900 dark:text-white">Employee Profile Detail</h3>
                <button @click="selectedEmployee = null" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="p-6 space-y-4 text-sm">
                <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-800">
                    <span class="font-semibold text-slate-500">Name</span>
                    <span class="font-bold text-slate-900 dark:text-white" x-text="selectedEmployee?.employee_name"></span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-800">
                    <span class="font-semibold text-slate-500">Phone</span>
                    <span class="font-semibold text-slate-900 dark:text-white" x-text="selectedEmployee?.phone_number"></span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-800">
                    <span class="font-semibold text-slate-500">Department</span>
                    <span class="font-semibold text-slate-900 dark:text-white" x-text="selectedEmployee?.department"></span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-800">
                    <span class="font-semibold text-slate-500">Job Title</span>
                    <span class="font-semibold text-slate-900 dark:text-white" x-text="selectedEmployee?.job_title"></span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-800">
                    <span class="font-semibold text-slate-500">Contract Type</span>
                    <span class="font-semibold text-indigo-600 dark:text-indigo-400" x-text="selectedEmployee?.contract_type"></span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="font-semibold text-slate-500">Attendance</span>
                    <span class="font-semibold text-emerald-600 dark:text-emerald-400" x-text="selectedEmployee?.attendance"></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
