@props(['value'])

<label {{ $attributes->merge(['class' => 'font-medium text-sm text-slate-900']) }}>
    {{ $value ?? $slot }}
</label>
