<div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Pago de Colegiatura
            </h3>
            <p class="mt-1 text-sm text-gray-600 dark:bg-gray-400">
                Realiza el pago seguro de tus colegiaturas con tarjeta de débito o crédito.
            </p>
        </div>
    </div>

    <div class="my-6 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-md border border-gray-100 dark:border-gray-700">
        <div class="flex justify-between items-center mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Concepto:</span>
            <span class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ $concept }}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Total a pagar:</span>
            <span class="text-lg font-extrabold text-indigo-600 dark:text-indigo-400">${{ number_format($amount, 2) }} MXN</span>
        </div>
    </div>

    <div class="flex items-center justify-end">
        <x-button wire:click="processPayment" wire:loading.attr="disabled">
            <span wire:loading.remove>Pagar con Stripe</span>
            <span wire:loading>Redirigiendo a pasarela...</span>
        </x-button>
    </div>
</div>