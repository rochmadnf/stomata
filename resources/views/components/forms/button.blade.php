<button type="{{ $type ?? 'submit' }}" @class([
    'w-full rounded-md p-2 font-medium',
    'bg-green-300 text-white hover:bg-green-400' => $color === 'primary',
    'bg-red-400 text-white hover:bg-red-500' => $color === 'danger',
])>
    {{ $label }}
</button>
