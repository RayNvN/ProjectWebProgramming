@extends('layouts.app')

@section('title', 'Nexa - Recruitment Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">Recruitment Dashboard</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Manage job postings, open positions, and requirements</p>
        </div>
        <a href="{{ route('jobs.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md transition-all duration-200">
            Add Jobs
        </a>
    </div>

    <!-- Job Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jobs as $job)
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 dark:bg-rose-950/40 text-rose-700 dark:text-rose-400 border border-rose-200/50 dark:border-rose-800/30">
                            Active until {{ $job->active_until }}
                        </span>
                    </div>
                    
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ $job->title }}</h3>
                    
                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-6 line-clamp-3">
                        {{ $job->description }}
                    </p>
                </div>
                
                <div class="flex flex-wrap gap-2 pt-4 border-t border-slate-100 dark:border-slate-800/80">
                    <span class="px-2.5 py-1 bg-slate-100 dark:bg-slate-850 rounded-lg text-xs font-semibold text-slate-700 dark:text-slate-300">
                        Design
                    </span>
                    <span class="px-2.5 py-1 bg-indigo-50 dark:bg-indigo-950/40 rounded-lg text-xs font-semibold text-indigo-700 dark:text-indigo-400">
                        {{ $job->type }}
                    </span>
                    <span class="px-2.5 py-1 bg-slate-100 dark:bg-slate-850 rounded-lg text-xs font-semibold text-slate-700 dark:text-slate-300">
                        Onsite
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
