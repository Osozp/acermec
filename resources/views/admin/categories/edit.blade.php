<x-layouts::admin>

    <section class="relative bg-white shadow-md rounded-lg mb-5">
        <div class="items-center justify-between p-4 flex space-y-0 space-x-4">
            <div>
                <h5 class="mr-3 font-semibold">Crear nueva categoria</h5>
                <p class="text-gray-500">Lista de categorias</p>
            </div>
        </div>
    </section>

    <section class="relative bg-white shadow-md rounded-lg mb-5">
        <div class="p-4">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">Nombre de categoria</label>
                                <div class="mt-2">
                                    <input id="name" type="text" name="name" value="{{ $category->name }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" autofocus />
                                </div>

                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 font-medium" id="name-error">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>


        </div>
    </section>

</x-layouts::admin>
