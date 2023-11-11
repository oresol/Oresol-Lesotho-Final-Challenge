@extends('layouts.navbar')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        #map {
            height: 100vh;
        }
    </style>
</head>
<body>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-providers@1.12.0/leaflet-providers.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([37.7749, -122.4194], 13); // Default coordinates: San Francisco

        L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map); // Default base layer

        // Optionally, add a marker at the default coordinates
        L.marker([37.7749, -122.4194]).addTo(map)
            .bindPopup('Default Location: San Francisco')
            .openPopup();
    });
</script>

</body>
</html>
@endsection