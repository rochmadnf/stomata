@php
    $btn = 'w-full rounded-md p-2 font-medium';
    $class = match ($color) {
        'primary' => "$btn bg-green-300 text-white hover:bg-green-400",
        'danger' => "$btn bg-red-400 text-white hover:bg-red-500",
        default => $btn,
    };
@endphp

<button type="{{ $type ?? 'submit' }}" class="{{ $class }}">
    {{ $label }}
</button>
