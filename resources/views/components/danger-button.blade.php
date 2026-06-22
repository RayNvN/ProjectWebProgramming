<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-3 bg-rose-600 hover:bg-rose-700 text-white font-semibold text-sm rounded-xl shadow-sm hover:shadow-md focus:outline-none focus:ring-4 focus:ring-rose-500/20 active:bg-rose-800 transition-all duration-200']) }}>
    {{ $slot }}
</button>
