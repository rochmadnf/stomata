<div class="mb-5">
    <label for="{{ $name }}" class="mb-2 block text-sm font-medium">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" @required($required ?? false)
        class="block w-full rounded-md border border-green-200 p-2.5 text-sm outline-none focus:border-green-400 focus:ring-green-400">
        <option value="{{ $initOptVal ?? 'false' }}" @disabled($disabled ?? false) @selected(true)>
            {{ $initOptLabel ?? '--Pilih ' . ucwords($label) . '--' }}
        </option>

        {{ $options ?? '' }}
    </select>
</div>
