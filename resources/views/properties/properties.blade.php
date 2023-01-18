
<x-app-layout>
    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @foreach ($properties as $property)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ $property->image }}" alt="{{ $property->title }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $property->title }}</h5>
                                <p class="card-text">{{ $property->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-muted
                                    ">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>