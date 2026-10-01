<x-layouts::admin>

    <section class="relative bg-white shadow-md rounded-lg mb-5">
        <div class="items-center justify-between p-4 flex space-y-0 space-x-4">
            <div>
                <h5 class="mr-3 font-semibold">Categorias</h5>
                <p class="text-gray-500">Lista de categorias</p>
            </div>
            <a href="{{ route('admin.categories.create') }}"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-900 hover:bg-blue-500 focus:ring-4 focus:ring-primary-300 focus:outline-none ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
                Nueva categoria
            </a>
        </div>
    </section>

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
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Crear
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($categories as $category)
                            <tr class="bg-neutral-primary border-b border-default">
                                <td class="px-6 py-4 font-semibold text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    {{ $category->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{-- {{ $category->email }} --}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="inline-flex rounded-lg shadow-xs -space-x-px" role="group">
                                        <a href="{{ route('admin.categories.edit', $category) }}"
                                            class="bg-yellow-500 p-1 rounded-l-lg">Editar</a>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                            class="delete-form bg-red-500 p-1 rounded-e-lg text-white">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                Eliminar
                                            </button>
                                        </form>

                                        {{-- <button type="button"
                                            class="text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary-soft font-medium leading-5 rounded-s-base text-sm px-3 py-2 focus:outline-none">
                                            Editar
                                        </button>
                                        <button type="button"
                                            class="text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary-soft font-medium leading-5 rounded-e-base text-sm px-3 py-2 focus:outline-none">
                                            Eliminar
                                        </button> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>
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

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif

</x-layouts::admin>
