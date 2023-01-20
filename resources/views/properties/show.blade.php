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
                <div class="row flex justify-around">
                    <div class="col w-1/2  text-gray-900 dark:text-gray-100 p-4">
                        <div style="width: 100%">
                            <iframe
                                width="100%"
                                height="200"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                                
                                src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=es&amp;q=
                                {{ $property->latitude }},{{ $property->longitude }}+(Kiteprop)
                                &amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                    <div class="col w-1/2  text-gray-900 dark:text-gray-100 p-4">
                        <h2>
                            {{ $property->title }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 with-750 word-break text-justify text-sm">
                            {{ $property->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
