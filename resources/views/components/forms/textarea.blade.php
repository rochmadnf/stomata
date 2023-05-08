<div class="mb-5">
    <label for="{{ $name }}"
        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <textarea id="{{ $name }}" {{ $rows ?? 5 }} name="{{ $name }}"
        class="block w-full rounded-lg border border-green-200 p-2.5 text-sm text-gray-900 outline-none focus:border-green-400 focus:ring-green-400"
        placeholder="{{ $placeholder ?? '' }}"></textarea>
</div>
