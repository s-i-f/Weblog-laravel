@props(['value'])

<label {{ $attributes->merge(['class' => 'font-medium text-sm text-slate-700']) }}>
    {{ $value ?? $slot }}
</label>
