@extends('layouts.app')

@section('title', 'Nexa - Add Job')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header Page -->
    <div class="mb-8">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Add New Job Post</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Fill in the details to publish a new job posting on the recruitment portal</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('jobs.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Job Title -->
            <div>
                <x-input-label for="title" :value="__('Job Title')" />
                <x-text-input id="title" type="text" name="title" required placeholder="e.g. Lead Product Designer" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Job Description')" />
                <textarea name="description" id="description" rows="5" required placeholder="Write job requirements, roles, and benefits here..." class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder-slate-450 dark:placeholder-slate-600"></textarea>
            </div>

            <!-- Job Type -->
            <div>
                <x-input-label for="type" :value="__('Job Type')" />
                <select name="type" id="type" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Contract">Contract</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>

            <!-- Active Until -->
            <div>
                <x-input-label for="active_until" :value="__('Active Until')" />
                <x-text-input type="date" name="active_until" id="active_until" required />
            </div>

            <!-- Is Active -->
            <div>
                <x-input-label for="is_active" :value="__('Status')" />
                <select name="is_active" id="is_active" required class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all">
                    <option value="1">Active</option>
                    <option value="0">Draft</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a href="{{ route('jobs.index') }}" class="px-5 py-3 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 transition-colors">
                    Cancel
                </a>
                <x-primary-button class="w-auto">
                    Post Job
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection