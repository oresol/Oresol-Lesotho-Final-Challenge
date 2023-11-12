<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map</title>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([-29.313443081134025, 27.48445138879433], 13);

        L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map);

        var stores = @json($stores);

        function getMarkerColor(storeType) {
            switch (storeType) {
                case 'Liqour':
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
    });
</script>
</body>
</html>