<div class="mb-5">
    <label for="{{ $name }}" class="mb-2 block cursor-pointer text-sm font-medium">{{ ucwords($label) }}</label>

    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" @class([
        'block w-full rounded-md border border-green-200 p-2.5 text-sm outline-none focus:border-green-400 focus:ring-green-400',
        'bg-red-50 border-red-500 focus:ring-red-500 focus:border-red-500' => $errors->has(
            $name),
    ])
        placeholder="{{ $placeholder ?? $label . '...' }}" value="{{ old($name) ?? '' }}" @readonly($readonly ?? false)>

    @error($name)
        <small class="mt-2 text-sm text-red-600 dark:text-red-500">
            {{ $errors->first($name) }}
        </small>
    @enderror
</div>
