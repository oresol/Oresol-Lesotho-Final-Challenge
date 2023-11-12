@extends('layouts.app')

@section('content')
    <div id="map" class="container" style="width: 80%; height:70vh; zIndex:0;"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-providers@1.12.0/leaflet-providers.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Maseru coordinates
            var maseruLatitude = -29.313443081134025;
            var maseruLongitude = 27.48445138879433;
            var map = L.map('map').setView([maseruLatitude, maseruLongitude], 13);

            L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map);

            var stores = @json($stores);

            function addMarkerColors(storeTy_id) {
                switch (storeTy_id) {
                    case 3:
                        return 'red';
                    case 4:
                        return 'blue';
                    case 5:
                        return 'black';
                    case 6:
                        return 'green';
                    case 7:
                        return 'purple';
                    default:
                        return 'red';
                }
            }

            stores.forEach(function(store) {
                var getColor = addMarkerColors(store.storeType_id);
                var marker = L.marker([parseFloat(store.longitude), parseFloat(store.latitude)], {
                    icon: L.icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-' +
                            getColor + '.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    })
                }).addTo(map);
                marker.bindPopup('<b>' + store.storeName + '</b><br>' + store.storeAddress);
            });
        });
    </script>
@endsection
