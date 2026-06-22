<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-5 py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 font-semibold text-sm rounded-xl shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800/80 focus:outline-none focus:ring-4 focus:ring-slate-550/10 active:bg-slate-100 dark:active:bg-slate-800 transition-all duration-200']) }}>
    {{ $slot }}
</button>
