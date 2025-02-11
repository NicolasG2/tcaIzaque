@props(['status'])

@if (isset($status) && $status)
    <div {{ $attributes->merge(['class' => 'text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif