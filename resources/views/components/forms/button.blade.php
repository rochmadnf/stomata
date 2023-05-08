<button id="{{ $id ?? str()->random(15) }}" type="{{ $type ?? 'submit' }}" @class([
    'w-full rounded-md p-2 font-medium ' . ($class ?? ''),
    'bg-green-400 text-white hover:bg-green-300' => $color === 'primary',
    'text-white bg-[#050708] hover:bg-[#050708]/80' => $color === 'dark',
    'bg-red-400 text-white hover:bg-red-500' => $color === 'danger',
])>
    {{ $label }}
</button>
