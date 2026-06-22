@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-xs text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-2']) }}>
    {{ $value ?? $slot }}
</label>
