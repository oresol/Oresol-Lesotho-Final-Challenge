@extends('layouts.app')

@section('content')
    <div id="map" class="container" style="width: 80%; height:70vh; zIndex:0;"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-providers@1.12.0/leaflet-providers.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var maseruLatitude = -29.313443081134025;
            var maseruLongitude = 27.48445138879433;
            var map = L.map('map').setView([maseruLatitude, maseruLongitude], 13);

            L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map);

            var stores = @json($stores);

            stores.forEach(function(store) {
                var marker = L.marker([parseFloat(store.longitude), parseFloat(store.latitude)]).addTo(map);
                marker.bindPopup('<b>' + store.storeName + '</b><br>' + store.storeAddress);
            });
        });
    </script>
@endsection
