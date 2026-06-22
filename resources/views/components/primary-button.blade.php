<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full inline-flex items-center justify-center px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-indigo-500/20 active:bg-indigo-800 transition-all duration-200']) }}>
    {{ $slot }}
</button>
