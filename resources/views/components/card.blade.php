<div id="{{ $id ?? str()->random(10) }}"
    class="{{ $size }} flex w-full flex-col gap-4 rounded-md bg-slate-50 p-4 shadow shadow-green-300 sm:p-6 md:p-8">

    @if (isset($cardTitle))
        <h4
            class="text-3xl font-bold tracking-wider underline decoration-green-400 decoration-4 underline-offset-[10px]">
            {{ $cardTitle }}
        </h4>
    @endif

    {{ $slot }}
</div>
