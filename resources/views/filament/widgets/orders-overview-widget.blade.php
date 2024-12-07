<x-filament::widget>
    <x-filament::card>
        <!-- Title -->
        <h2 class="text-xl font-bold mb-6 text-gray-900 dark:text-gray-100">Orders Overview</h2>

        <!-- Grid Container -->
        <div class="grid grid-cols-4 gap-6">
            <!-- Total Orders -->
            <div class="flex flex-col items-center justify-center p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total</h3>
                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $this->getOrderCounts()['total'] }}</p>
            </div>

            <!-- Pending Orders -->
            <div class="flex flex-col items-center justify-center p-4 bg-yellow-50 dark:bg-yellow-900 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-yellow-500 dark:text-yellow-400">Pending</h3>
                <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-300">{{ $this->getOrderCounts()['pending'] }}</p>
            </div>

            <!-- In Progress Orders -->
            <div class="flex flex-col items-center justify-center p-4 bg-blue-50 dark:bg-blue-900 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-blue-400">In Progress</h3>
                <p class="text-3xl font-bold text-blue-600 dark:text-blue-300">{{ $this->getOrderCounts()['in_progress'] }}</p>
            </div>

            <!-- Delivered Orders -->
            <div class="flex flex-col items-center justify-center p-4 bg-green-50 dark:bg-green-900 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-green-500 dark:text-green-400">Delivered</h3>
                <p class="text-3xl font-bold text-green-600 dark:text-green-300">{{ $this->getOrderCounts()['delivered'] }}</p>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
