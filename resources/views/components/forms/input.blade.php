<div class="mb-5">
    <label for="{{ $name }}" class="mb-2 block text-sm font-medium">{{ ucwords($label) }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}"
        class="block w-full rounded-md border border-green-200 bg-slate-100 p-2.5 text-sm outline-none focus:border-green-400 focus:ring-green-400"
        placeholder="{{ $placeholder ?? '' }}">
</div>
