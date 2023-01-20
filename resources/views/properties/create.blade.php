<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Properties') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-6" width="50%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="flex w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat">
                <!-- <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 backdrop-blur-md max-sm:px-8"> -->
                    <div class="text-black">
                        <div class="mb-8 flex flex-col items-center">
                            <h1 class="mb-2 text-white text-3xl font-bold">Crear Propiedad</h1>
                        </div>
                        <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 text-lg">
                                <input class="rounded-3xl border-none px-6 py-2 text-center text-inherit  outline-none backdrop-blur-md" type="text" id="title" name="title" placeholder="Titulo" required />
                            </div>
                            <div class="mb-4 text-lg">
                                <input class="rounded-3xl border-none px-6 py-2 text-center text-inherit  outline-none backdrop-blur-md" type="text" id="description" name="description" placeholder = "Descripcion" />
                            </div>
                            <div class="mb-4 text-lg">
                                <input class="rounded-3xl border-none px-6 py-2 text-center text-inherit  outline-none backdrop-blur-md" type="text" id="latitude" name="latitude" placeholder = "Latitud" required/>
                            </div>
                            <div class="mb-4 text-lg">
                                <input class="rounded-3xl border-none px-6 py-2 text-center text-inherit  outline-none backdrop-blur-md" type="text" id="longitude" name="longitude" placeholder = "Longitud" required/>
                            </div>
                            <div class="mb-4 overflow-hidden">
                                <input class="rounded-3xl border-none text-white text-inherit  outline-none backdrop-blur-md border-1 display: none cursor: pointer" type="file" id="image" name="image"/>
                                <label id='image-label' class='form-control' for='file-input-thing'/>
                            </div>
                            <div class="mt-8 flex justify-center text-lg text-black">
                                <button type="submit" id="btn" disabled class="rounded-3xl px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-blue-600">Crear</button>
                            </div>
                        </form>
                    </div>
                <!-- </div> -->
            </div>
            <div class="py-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div style="width: 100%">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe width="100%" height="100%" id="gmap_canvas" id="mapa"
                                        frameborder="0"
                                        scrolling="no"
                                        marginheight="0"
                                        marginwidth="0">
                                    </iframe>
                                    <style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style>
                                    <style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div>
                            </div>
                        </div>
                    </div>
                </div>

            
        </div>
    </div>
</x-app-layout>

<script>
function initMap() {
    var latitude = document.getElementById("latitude").value;
    var longitude = document.getElementById("longitude").value;
    if (latitude != "" && longitude != "") {
        var mapa = document.getElementById("mapa");
        var src = "https://maps.google.com/maps?q=" + latitude + "," + longitude + "&t=&z=13&ie=UTF8&iwloc=&output=embed";
        document.getElementById("gmap_canvas").src = src;
        document.getElementById("btn").disabled = false;
    }
}
document.getElementById("latitude").addEventListener("keyup", initMap);
document.getElementById("longitude").addEventListener("keyup", initMap);

function validateImage() {
    var image = document.getElementById("image").value;
    if (image != "") {
        console.log(image);

        document.getElementById("image-label").innerHTML = image;
        document.getElementById("btn").disabled = false;
    } else {
        console.log(image);
        document.getElementById("image-label").innerHTML = "Seleccionar Imagen";
        document.getElementById("btn").disabled = true;
    }
}
document.getElementById("image").addEventListener("change", validateImage);
</script>