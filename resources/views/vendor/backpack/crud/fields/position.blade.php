{{-- position_field field --}}
@php
    $field['value'] = old_empty_or_null($field['name'], '') ?? ($field['value'] ?? ($field['default'] ?? ''));
@endphp

@include('crud::fields.inc.wrapper_start')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    {{-- <label>{!! $field['label'] !!}</label> --}}
    @include('crud::fields.inc.translatable_icon')

    <input type="text"
        name="{{ $field['name'] }}"
        data-init-function="bpFieldInitDummyFieldElement"
        value="{{ $field['value'] }}"
        hidden="hidden"
        @include('crud::fields.inc.attributes')>
    <div id="map">

    </div>
    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

{{-- CUSTOM CSS --}}
@push('crud_fields_styles')
    {{-- How to load a CSS file? --}}
    @loadOnce('positionFieldStyle.css')

    {{-- How to add some CSS? --}}
    @loadOnce('position_field_style')
        <style>
            .position_field_class {
                display: none;
            }
            #map{
                height: 360px;
            }
        </style>
    @endLoadOnce
@endpush

{{-- CUSTOM JS --}}
@push('crud_fields_scripts')
    {{-- How to load a JS file? --}}
    @loadOnce('positionFieldScript.js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

    {{-- How to add some JS to the field? --}}
    @loadOnce('bpFieldInitDummyFieldElement')
    <script>

        function bpFieldInitDummyFieldElement(element) {
            //init de la map
            var map = L.map('map').setView([50.666872, 4.42749], 7);
            //init markers
            var lat=parseFloat(document.getElementsByName("lat")[0].value);
            var lon=parseFloat(document.getElementsByName("lon")[0].value);
            var markers=[];
            markers.push(L.marker([lat,lon]).addTo(map));
            //ajout du layer à la map
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            //ajout event click sur la map
            map.on('click',onMapClick)

            //Cliquer sur map
            function onMapClick(e) {
                //Suppresion elmt précent
                markers.forEach(element => {
                    element._removeIcon();
		            element._removeShadow();
                });
                markers=[];
                //Ajout marker
                markers.push(L.marker([e.latlng.lat,e.latlng.lng]).addTo(map));
                console.log(markers);
                //Ajout au formulaire
                document.getElementsByName("lat")[0].value=e.latlng.lat;
                document.getElementsByName("lon")[0].value=e.latlng.lng;
        }
        }
    </script>
    @endLoadOnce
@endpush
