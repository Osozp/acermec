<x-layouts::admin>

    <section class="relative bg-white shadow-md rounded-lg mb-5">
        <div class="items-center justify-between p-4 flex space-y-0 space-x-4">
            <div>
                <h5 class="mr-3 font-semibold">Compra de Productos</h5>
                <p class="text-gray-500">Lista de productos</p>
            </div>
            <a href="{{ route('admin.products.create') }}"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-900 hover:bg-blue-500 focus:ring-4 focus:ring-primary-300 focus:outline-none ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
                Nuevo producto
            </a>
        </div>
    </section>



    <section class="grid grid-cols-2 gap-4 mb-5">

        <div class="bg-white rounded-lg shadow-md p-4 border-2 border-t-emerald-600 flex flex-col max-h-[85vh]">
            <form action="{{ route('admin.purchases.store') }}" method="POST" class="flex flex-col flex-1 min-h-0">
                @csrf
                <!-- 1. ENCABEZADO DE TABLA / COLUMNAS -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3 bg-gray-50 border border-gray-200 rounded-t-lg font-bold text-xs text-gray-600 uppercase tracking-wider">
                    <!-- Información del producto -->
                    <div class="flex-1 min-w-0">

                    </div>

                    <!-- Controles -->
                    <div class="flex items-center gap-3">
                        <div class="w-20 text-center">
                            <span>Cantidad</span>
                        </div>
                        <div class="w-28 text-center">
                            <span>Precio U.</span>
                        </div>
                        <div class="w-24 text-right">
                            <span>Subtotal</span>
                        </div>
                        <!-- Espaciador para alinear con el botón de eliminar -->
                        <div class="w-8"></div>
                    </div>
                </div>

                <!-- 2. CONTENEDOR DE PRODUCTOS (HACE SCROLL SI HAY MUCHOS) -->
                <div id="purchase-details-container"
                    class="flex-1 overflow-y-auto p-1 space-y-2 border-x border-b border-gray-200 rounded-b-lg mb-4 min-h-[150px] max-h-[400px]">
                    <!-- Aquí JS insertará dinámicamente las filas -->
                </div>

                <!-- 3. PIE DE PÁGINA (SIEMPRE FIJO AL FINAL) -->
                <div class="mt-auto pt-3 border-t border-gray-200 flex flex-col gap-3">

                    <!-- Fila del Total -->
                    <div class="flex justify-end items-center gap-2">
                        <span class="text-gray-600 font-semibold text-sm">Total General:</span>
                        <span class="text-2xl font-bold text-emerald-700">
                            <span id="total-display">0.00</span> Bs.
                        </span>
                        <input type="hidden" name="total" id="total-input" value="0">
                    </div>

                    <!-- Fila de Fecha y Guardar -->
                    <div class="flex flex-col sm:flex-row items-end sm:items-center justify-between gap-3 pt-2">
                        <!-- Campo Fecha -->
                        <div class="w-full sm:w-auto">
                            <label for="purchase_date" class="block text-xs font-semibold text-gray-600 mb-1">
                                Fecha de Compra
                            </label>
                            <input type="date" id="purchase_date" name="purchase_date"
                                class="w-full sm:w-48 rounded-md border border-gray-300 bg-gray-50 p-2 text-sm text-gray-800 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 focus:outline-none"
                                value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Botón Guardar -->
                        <button type="submit"
                            class="w-full cursor-pointer sm:w-auto px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Guardar Compra
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-md p-2 border-2 border-t-amber-600">
            <div class="flex justify-between mt-6 gap-4">
                <label for="select">
                    <select class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                        id="select">
                        <option selected>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>25</option>
                    </select>
                </label>

                <div class="flex items-center gap-3">
                    <span class="inline-block text-gray-500"> Buscar </span>
                    <div>
                        <label for="buscar">
                            <input type="text" id="buscar"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500">

                        </label>
                    </div>
                </div>
            </div>

            <div class="border mt-4 rounded-lg">
                <table class="w-full text-sm text-left rounded-lg bg-gray-200">
                    <thead class="text-sm text-body   border-b rounded-lg">
                        <tr class="">
                            <th scope="col" class="px-6 py-3 font-medium w-16">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Codigo
                            </th>

                            <th scope="col" class="px-6 py-3 font-medium">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($products as $product)
                            <tr class="bg-neutral-primary border-b border-default">
                                <td class="px-6 py-4 font-semibold text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    {{ $product->codigo }}
                                </th>

                                <td class="px-6 py-4">
                                    {{ $product->description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button"
                                        class="text-white bg-emerald-600 border border-brand hover:bg-emerald-700 font-medium rounded-sm text-xs px-2 py-1.5 btn-add-product"
                                        data-id="{{ $product->id }}" data-code="{{ $product->codigo }}"
                                        data-description="{{ $product->description }}">
                                        Agregar
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="w-full">
                                    Aun no hay datos
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <nav class="mt-2 flex items-center justify-center sm:mt-8" aria-label="Page navigation example">
                <ul class="flex h-8 items-center -space-x-px text-sm">
                    <li>
                        <a href="#"
                            class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m15 19-7-7 7-7" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="z-10 flex h-8 items-center justify-center border border-primary-300 bg-primary-50 px-3 leading-tight text-primary-600 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    @if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-300" role="alert">
        <span class="font-bold">¡Atención! Revisa los siguientes errores:</span>
        <ul class="mt-1.5 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <section class="relative bg-white shadow-md rounded-lg mb-5">
        <div class="p-4">
            <div class="flex justify-between mt-6 gap-4">
                <select class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900">
                    <option selected>10</option>
                    <option>15</option>
                    <option>20</option>
                    <option>25</option>
                </select>

                <div class="flex items-center gap-3">
                    <span class="inline-block text-gray-500"> Buscar </span>
                    <div>
                        <input type="text"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500">
                    </div>
                </div>
            </div>

            <div class="border mt-4 rounded-lg">
                <table class="w-full text-sm text-left rounded-lg bg-gray-200">
                    <thead class="text-sm text-body   border-b rounded-lg">
                        <tr class="">
                            <th scope="col" class="px-6 py-3 font-medium w-16">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Codigo
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Categoria
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($products as $product)
                            <tr class="bg-neutral-primary border-b border-default">
                                <td class="px-6 py-4 font-semibold text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    {{ $product->codigo }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    {{ $product->category->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="inline-flex rounded-lg shadow-xs -space-x-px" role="group">
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                            class="bg-yellow-500 p-1 rounded-l-lg">Editar</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                            class="delete-form bg-red-500 p-1 rounded-e-lg text-white">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="w-full">
                                    Aun no hay datos
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <nav class="mt-2 flex items-center justify-center sm:mt-8" aria-label="Page navigation example">
                <ul class="flex h-8 items-center -space-x-px text-sm">
                    <li>
                        <a href="#"
                            class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m15 19-7-7 7-7" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="z-10 flex h-8 items-center justify-center border border-primary-300 bg-primary-50 px-3 leading-tight text-primary-600 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>



    @push('js')
        @vite('resources/js/compras.js')

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
</x-layouts::admin>
