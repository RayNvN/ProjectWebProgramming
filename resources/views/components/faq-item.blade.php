@props(['question'])

<div x-data="{ open: false }" class="border-b border-slate-200 dark:border-slate-800 py-4 transition-colors">
    <button 
        @click="open = !open" 
        class="w-full flex justify-between items-center text-left py-2 text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 focus:outline-none transition-colors"
    >
        <span class="text-base font-semibold">{{ $question }}</span>
        <span class="ml-6 flex-shrink-0">
            <!-- Plus Icon when closed, Minus Icon when open -->
            <svg x-show="!open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <svg x-show="open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
            </svg>
        </span>
    </button>
    <div 
        x-show="open" 
        x-collapse
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        class="mt-2 text-sm text-slate-600 dark:text-slate-400 leading-relaxed"
    >
        {{ $slot }}
    </div>
</div>
