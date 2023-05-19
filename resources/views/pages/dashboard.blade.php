<x-main-layout subtitle="dashboard">

    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Dashboard</h1>

        <div id="mapbox" class="min-h-screen rounded-md"></div>
    </div>

    <x-slot name='scripts'>
        @vite('resources/js/pages/dashboard-admin.js')
    </x-slot>

</x-main-layout>
