@props(['title', 'description'])

<div class="group relative bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col items-start">
    <div class="p-3 bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 rounded-xl mb-4 group-hover:scale-110 transition-transform duration-300">
        {{ $slot }}
    </div>
    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ $title }}</h3>
    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ $description }}</p>
</div>
