@extends('layouts.app')

@section('title', 'Nexa - Time Off Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">Time Off Dashboard</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Review, approve or reject employee leave and time off requests</p>
        </div>
        <a href="{{ route('timeoffs.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md transition-all duration-200">
            Create Time Off Request
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-400 text-xs font-bold uppercase tracking-wider border-b border-slate-200 dark:border-slate-800">
                        <th class="px-6 py-4">Employee Name</th>
                        <th class="px-6 py-4">Start Date</th>
                        <th class="px-6 py-4">End Date</th>
                        <th class="px-6 py-4">Total Days</th>
                        <th class="px-6 py-4">Leave Type</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800/80 text-sm">
                    @foreach($timeoffs as $timeoff)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-900 dark:text-white">{{ $timeoff->employee->employee_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $timeoff->leave_form }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $timeoff->leave_to }}</td>
                            <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $timeoff->days }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-50 dark:bg-indigo-950/50 text-indigo-700 dark:text-indigo-400 border border-indigo-200/50 dark:border-indigo-800/30">
                                    {{ $timeoff->leave_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($timeoff->status == 'Pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-400 border border-amber-200/50 dark:border-amber-800/30">
                                        Pending
                                    </span>
                                @elseif($timeoff->status == 'Approved' || $timeoff->status == 'approved')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 border border-emerald-200/50 dark:border-emerald-800/30">
                                        Approved
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 dark:bg-rose-950/50 text-rose-700 dark:text-rose-400 border border-rose-200/50 dark:border-rose-800/30">
                                        {{ ucfirst($timeoff->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                @if($timeoff->status == 'Pending')
                                    <form action="{{ route('timeoffs.approve', $timeoff->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 border border-transparent rounded-lg transition-all">
                                            Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('timeoffs.reject', $timeoff->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-bold text-white bg-rose-600 hover:bg-rose-700 border border-transparent rounded-lg transition-all">
                                            Reject
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider">Processed</span>
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
