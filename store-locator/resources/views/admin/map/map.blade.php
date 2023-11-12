<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([-29.3221, 27.4924], 13); 

        L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map); 

        var stores = @json($stores);

        stores.forEach(function (store) {
            var marker = L.marker([parseFloat(store.latitude), parseFloat(store.longitude)]).addTo(map);
            marker.bindPopup('<b>' + store.store_name + '</b><br>' + store.address);
        });
    });
</script>

</body>
</html>