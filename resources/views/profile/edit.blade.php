@extends('layouts.app')

@section('title', 'Nexa - User Profile')

@section('content')
<div class="max-w-3xl mx-auto space-y-8 animate-fade-in">
    <!-- Header Page -->
    <div>
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">Account Settings</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Manage your account information, password, and preferences</p>
    </div>

    <!-- Update Profile Info Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-2xl shadow-sm">
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Update Password Card -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-2xl shadow-sm">
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Delete Account Card -->
    <div class="bg-white dark:bg-slate-900 border border-rose-200 dark:border-rose-950/40 p-6 sm:p-8 rounded-2xl shadow-sm">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
