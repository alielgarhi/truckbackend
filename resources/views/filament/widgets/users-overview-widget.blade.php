<x-filament::widget>
    <x-filament::card>
        <h2 class="text-xl font-bold mb-4">Users Overview</h2>
        <div class="text-center">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <p class="text-2xl font-bold text-gray-900">{{ $this->getUserCount() }}</p>
        </div>
    </x-filament::card>
</x-filament::widget>
