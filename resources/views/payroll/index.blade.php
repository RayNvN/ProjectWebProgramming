@extends('layouts.app')

@section('title', 'Nexa - Payroll Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">Payroll Dashboard</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Track and manage employee payments, invoices, and methods</p>
        </div>
        <a href="{{ route('payroll.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md transition-all duration-200">
            Create Payroll Invoice
        </a>
    </div>

    <!-- Payment Method Card (Credit Card Design) -->
    <div class="max-w-xl bg-gradient-to-br from-indigo-600 to-indigo-800 text-white p-6 sm:p-8 rounded-2xl shadow-lg relative overflow-hidden transition-all hover:shadow-xl">
        <!-- Ambient Graphic Circles -->
        <div class="absolute right-0 bottom-0 translate-x-12 translate-y-12 w-64 h-64 bg-white/5 rounded-full pointer-events-none"></div>
        <div class="absolute left-0 top-0 -translate-x-12 -translate-y-12 w-48 h-48 bg-white/5 rounded-full pointer-events-none"></div>

        <div class="flex justify-between items-start mb-10">
            <div>
                <p class="text-xs text-indigo-200 uppercase tracking-widest font-semibold">Payment Account</p>
                <h4 class="text-lg font-bold mt-1">ABC Company</h4>
            </div>
            <span class="text-2xl font-black italic text-indigo-200">Visa</span>
        </div>

        <div class="space-y-6">
            <div>
                <p class="text-xs text-indigo-200 uppercase tracking-widest font-semibold mb-1">Account Number</p>
                <p class="text-xl sm:text-2xl font-mono tracking-widest">•••• •••• •••• 1121</p>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs text-indigo-200 uppercase tracking-widest font-semibold">Expiration</p>
                    <p class="text-sm font-medium mt-0.5">12/25</p>
                </div>
                <span class="px-2.5 py-1 text-xs font-semibold bg-white/20 border border-white/20 rounded-lg">Active</span>
            </div>
        </div>
    </div>

    <!-- Payroll Table Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-400 text-xs font-bold uppercase tracking-wider border-b border-slate-200 dark:border-slate-800">
                        <th class="px-6 py-4">Employee Name</th>
                        <th class="px-6 py-4">Start Date</th>
                        <th class="px-6 py-4">End Date</th>
                        <th class="px-6 py-4">Total Days</th>
                        <th class="px-6 py-4">Total Hours</th>
                        <th class="px-6 py-4">Invoice Amount</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800/80 text-sm">
                    @foreach($payrolls as $payroll)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900 dark:text-white">
                                {{ $payroll->employee->employee_name }} 
                                <span class="text-xs text-slate-400 dark:text-slate-500 font-normal">({{ $payroll->employee->id }})</span>
                            </td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $payroll->start_date }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $payroll->end_date }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $payroll->total_days ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $payroll->total_hours ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-bold text-slate-900 dark:text-white">${{ number_format($payroll->invoice_amount, 2) }}</td>
                            <td class="px-6 py-4">
                                @if($payroll->status == 'Paid')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 border border-emerald-200/50 dark:border-emerald-800/30">
                                        {{ $payroll->status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-400 border border-amber-200/50 dark:border-amber-800/30">
                                        {{ $payroll->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('payroll.edit', $payroll->id) }}" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-amber-600 hover:text-white bg-amber-50 hover:bg-amber-600 border border-transparent rounded-lg transition-all dark:bg-amber-950/30 dark:text-amber-400">
                                    Edit
                                </a>
                                @if($payroll->status == 'Unpaid')
                                    <form method="POST" action="{{ route('payroll.pay', $payroll->id) }}" class="inline-block">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 border border-transparent rounded-lg transition-all">
                                            Pay
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
