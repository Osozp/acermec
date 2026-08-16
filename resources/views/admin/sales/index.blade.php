<x-layouts::admin>

    <section class="relative bg-white shadow-md rounded-lg mb-5">
        <div class="items-center justify-between p-4 flex space-y-0 space-x-4">
            <div>
                <h5 class="mr-3 font-semibold">Venta de Productos</h5>
                <p class="text-gray-500">Lista de productos</p>
            </div>
            <a href="{{ route('admin.sales.create') }}"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-900 hover:bg-blue-500 focus:ring-4 focus:ring-primary-300 focus:outline-none ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
                Nueva de venta
            </a>
        </div>
    </section>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto px-4 2xl:px-0">
            <div class="mx-auto max-w-3xl space-y-6 sm:space-y-8">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                    Ventas del dia
                </h2>

                <ol class="relative border-s border-gray-200 dark:border-gray-700">
                    @foreach ($sales as $sale)
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute -start-2.5 flex h-5 w-5 items-center justify-center rounded-full bg-primary-100 ring-8 ring-white dark:bg-primary-900 dark:ring-gray-900">
                                <svg class="h-3 w-3 text-primary-800 dark:text-primary-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                            </span>
                            <span
                                class="inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                {{ $sale->total }} Bs. <span class="ml-2 text-green-600">{{ $sale->created_at }}</span>
                            </span>
                            @foreach ($sale->products as $product)
                                <h3 class="mb-0.5 mt-2 text-lg font-semibold text-primary-800 dark:text-primary-300">
                                    {{ $product->description }}
                                </h3>
                            @endforeach
                            <p class="text-base font-normal text-primary-700 dark:text-primary-300">
                                Please pack the product
                                and accessories received in the original packaging. The courier will contact you to pick
                                up
                                the package from the specified address.
                            </p>
                        </li>
                    @endforeach
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute -start-2.5 flex h-5 w-5 items-center justify-center rounded-full bg-primary-100 ring-8 ring-white dark:bg-primary-900 dark:ring-gray-900">
                            <svg class="h-3 w-3 text-primary-800 dark:text-primary-300" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                        </span>
                        <span
                            class="inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                            <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            02 February 2024
                        </span>
                        <h3 class="mb-0.5 mt-2 text-lg font-semibold text-primary-800 dark:text-primary-300">
                            Your request has been registered
                        </h3>
                        <p class="text-base font-normal text-primary-700 dark:text-primary-300">
                            Please pack the product
                            and accessories received in the original packaging. The courier will contact you to pick up
                            the package from the specified address.
                        </p>
                    </li>

                    <li class="mb-10 ms-6">
                        <span
                            class="absolute -start-2.5 flex h-5 w-5 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-800 dark:ring-gray-900">
                            <svg class="h-3 w-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                        </span>
                        <h3 class="mb-1.5 text-lg font-semibold leading-none text-gray-900 dark:text-white">Pick up
                            product from the address</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Estimated time 2 February 2024
                            - 5 February 2024.</p>
                    </li>

                    <li class="mb-10 ms-6">
                        <span
                            class="absolute -start-2.5 flex h-5 w-5 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-800 dark:ring-gray-900">
                            <svg class="h-3 w-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                        </span>
                        <h3 class="mb-1.5 text-lg font-semibold leading-none text-gray-900 dark:text-white">Product
                            check</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">We will carefully check the
                            product and inform you as soon as possible if you are eligible for a refund.</p>
                    </li>

                    <li class="ms-6">
                        <span
                            class="absolute -start-2.5 flex h-5 w-5 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-800 dark:ring-gray-900">
                            <svg class="h-3 w-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                        </span>
                        <h3 class="mb-1.5 text-lg font-semibold leading-none text-gray-900 dark:text-white">Refund the
                            amount</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">We will return the amount
                            depending on the option chosen.</p>
                    </li>
                </ol>

                <div class="sm:flex items-center sm:space-x-4 space-y-4 sm:space-y-0">
                    <a href="#" title=""
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                        role="button">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                        Back to your account
                    </a>
                    <button type="button"
                        class="w-full sm:w-auto flex justify-center items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        Cancel the refund
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="relative bg-white shadow-md rounded-lg mb-5">
        <div class="p-4">
            <!-- Encabezado y buscador -->
            <div class="flex justify-between items-center gap-4">
                <h5 class="font-semibold text-lg text-gray-800">Historial de Ventas</h5>
                <div class="flex items-center gap-3">
                    <span class="inline-block text-gray-500 text-sm">Buscar</span>
                    <div>
                        <input type="text"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500"
                            placeholder="Buscar compra...">
                    </div>
                </div>
            </div>

            <!-- Tabla de Compras -->
            <div class="border mt-4 rounded-lg overflow-x-auto">
                <table class="w-full text-sm text-left rounded-lg bg-gray-200">
                    <thead class="text-xs uppercase bg-gray-100 text-gray-700 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-semibold w-16">#</th>
                            <th scope="col" class="px-6 py-3 font-semibold">Fecha de Compra</th>
                            <th scope="col" class="px-6 py-3 font-semibold">Total</th>
                            <th scope="col" class="px-6 py-3 font-semibold text-center">Acciones</th>
                        </tr>
                    </thead>
                    {{-- <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($purchases as $purchase)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-semibold text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 font-bold text-emerald-600">
                                    {{ number_format($purchase->total, 2) }} Bs.
                                </td>
                                <!-- Columna de Estado -->
                                <td class="px-6 py-4 text-center">
                                    @if ($purchase->status === 'canceled')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-red-300">
                                            Anulada
                                        </span>
                                    @else
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-green-300">
                                            Completada
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex rounded-lg shadow-xs space-x-1">
                                        <button type="button"
                                            class="bg-blue-600 hover:bg-blue-700 text-white p-1.5 rounded-lg text-xs flex items-center gap-1 transition-colors btn-show-purchase"
                                            data-id="{{ $purchase->id }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Ver
                                        </button>

                                        @if ($purchase->status !== 'canceled')
                                            <button type="button"
                                                class="bg-red-500 hover:bg-red-600 text-white p-1.5 rounded-lg text-xs flex items-center gap-1 transition-colors btn-cancel-purchase"
                                                data-id="{{ $purchase->id }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Anular
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    No se encontraron compras registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody> --}}
                </table>
            </div>

            <!-- Paginación nativa de Laravel -->
            {{-- <div class="mt-4">
                {{ $purchases->links() }}
            </div> --}}
        </div>
    </section>

    @push('js')
        @vite('resources/js/ventas.js')

        @if (session('success'))
            <script>
                setTimeout(() => {
                    if (typeof window.showToast === 'function') {
                        window.showToast('success', @json(session('success')));
                    }
                }, 50);
            </script>
        @endif
    @endpush

    <!-- MODAL DE DETALLE DE COMPRA -->
    <div id="purchase-detail-modal"
        class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full overflow-hidden flex flex-col max-h-[90vh]">
            <!-- Encabezado del Modal -->
            <div class="px-6 py-4 bg-emerald-600 text-white flex items-center justify-between">
                <h3 class="text-lg font-bold">Detalle de Compra #<span id="modal-purchase-id"></span></h3>
                <button id="close-modal-btn" type="button"
                    class="text-white hover:bg-emerald-700 p-1.5 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Cuerpo del Modal -->
            <div class="p-6 overflow-y-auto flex-1 space-y-4">
                <div class="flex justify-between items-center text-sm text-gray-600 border-b pb-3">
                    <p><strong>Fecha de compra:</strong> <span id="modal-purchase-date"></span></p>
                    <p><strong>Total general:</strong> <span id="modal-purchase-total"
                            class="font-bold text-emerald-600 text-base"></span> Bs.</p>
                </div>

                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2 text-center">Cantidad</th>
                            <th class="px-4 py-2 text-right">P. Unitario</th>
                            <th class="px-4 py-2 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="modal-items-body" class="divide-y divide-gray-200">
                        <!-- Filas cargadas dinámicamente con JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts::admin>
