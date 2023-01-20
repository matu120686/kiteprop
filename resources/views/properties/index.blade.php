<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Properties') }}
            </h2>
            <a href="{{ route('properties.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Propiedad</a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="justify-center w-full">
                        <thead>
                            <tr>
                                <th class="px-3 py-3">Titulo</th>
                                <th class="px-3 py-3">Descripcion</th>
                                <th class="px-3 py-3">Ubicación</th>
                                <th class="px-3 py-3">Mapa</th>
                                <th class="px-3 py-3">Imagen</th>
                                <th class="px-3 py-3">Acciónes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-400 justify-center">
                            @foreach ($properties as $property)
                                <tr>
                                    <td class="px-1 py-2" style="text-align: center">{{ $property->title }}</td>
                                    <td class="px-3 py-2" style="text-align: center width-750 word-break text-justify text-sm">{{ $property->description }}</td>
                                    <td class="px-3 py-2" style="text-align: center">{{ $property->latitude }}, {{ $property->longitude }}</td>
                                    <td class="px-3 py-2" style="text-align: center">
                                        <div style="width: 100%">
                                            <iframe
                                                width="100%"
                                                height="80%"
                                                zoom="0.5"
                                                frameborder="0"
                                                scrolling="no"
                                                marginheight="0"
                                                marginwidth="0"
                                                src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=es&amp;q=
                                                {{ $property->latitude }},{{ $property->longitude }}+(Kiteprop)
                                                &amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                            </iframe>
                                        </div>
                                    </td>
                                    <td class="px-5 py-2" style="text-align: center">
                                        <a class="border px-3 py-2" href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </td>
                                    <td class="px-1 py-2" style="text-align: center">
                                    @if ($property->image)
                                        <img src="{{ asset('images/' . $property->image) }}" alt="{{ $property->title }}" style="width: 100px; height: 100px">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="{{ $property->title }}" style="width: 100px; height: 100px">
                                    @endif
                                    <td class="px-1 py-2" style="text-align: center">
                                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border px-3 py-2">Eliminar</button>
                                        </form>
                                    </td>
                                    <td class="px-1 py-2" style="text-align: center">
                                        <a class="border px-6 py-2" href="{{ route('properties.edit', $property->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
