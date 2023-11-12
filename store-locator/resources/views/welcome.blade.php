@extends('layouts.navbar')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locate Store</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-extra-markers/dist/css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div id="map" class="card">
                <div class="card-body" style="height: 800px; width: 1000px;"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-providers@1.12.0/leaflet-providers.js"></script>
<script src="https://unpkg.com/leaflet-extra-markers/dist/js/leaflet.extra-markers.min.js"></script>
<!-- Include Leaflet Control Geocoder -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([-29.313443081134025, 27.48445138879433], 13);

        L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map);

        var stores = @json($stores);

        function getMarkerColor(storeType) {
            switch (storeType) {
                case 'Liquor':
                    return 'red';
                case 'Inside-Mall':
                    return 'blue';
                case 'Supermarket':
                    return 'green';
                case 'Stationery':
                    return 'orange';
                case 'Retail':
                    return 'purple';
                default:
                    return 'gray';
            }
        }

        stores.forEach(function (store) {
            var markerColor = getMarkerColor(store.store_type);
            var marker = L.marker([parseFloat(store.latitude), parseFloat(store.longitude)], {
                icon: L.ExtraMarkers.icon({
                    icon: 'fa-number',
                    number: '',
                    markerColor: markerColor,
                    shape: 'circle',
                    prefix: 'fas'
                })
            }).addTo(map);

            marker.bindPopup('<b>' + store.store_name + '</b><br>' + store.address);
        });

        // Add the geocoder control
        L.Control.geocoder().addTo(map);
    });
</script>
</body>
</html>

@endsection
