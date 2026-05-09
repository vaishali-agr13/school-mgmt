<!DOCTYPE html>
<html>
<head>
    <title>Ola Maps Laravel Integration</title>

    <link href="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css" rel="stylesheet" />

<script src="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.js"></script>
<link href="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css" rel="stylesheet">

<script src="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
        }

        .top-bar{
            padding:15px;
            background:#f5f5f5;
            display:flex;
            gap:10px;
            align-items:center;
            flex-wrap:wrap;
        }

        #searchBox{
            width:300px;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        #map{
            width:100%;
            height:90vh;
        }

        .info-box{
            background:white;
            padding:10px;
            border-radius:10px;
            position:absolute;
            top:80px;
            left:10px;
            z-index:999;
            box-shadow:0 2px 10px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="top-bar">

    <input type="text" id="searchBox" placeholder="Search location">

    <button onclick="searchLocation()">
        Search
    </button>

</div>

<div class="info-box">
    <strong>Radius Restriction:</strong> 5 KM
</div>

<div id="map"></div>

<!-- Ola Maps SDK -->
<script src="https://unpkg.com/olamaps-web-sdk@latest/dist/olamaps-web-sdk.umd.js"></script>

<script>
const apiKey = "{{ env('OLA_MAPS_API_KEY') }}";
const defaultLat = 22.7196;
const defaultLng = 75.8577;

const map = new maplibregl.Map({
    container: 'map',

    style: {
        version: 8,
        sources: {
            osm: {
                type: 'raster',
                tiles: [
                    'https://a.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    'https://b.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    'https://c.tile.openstreetmap.org/{z}/{x}/{y}.png'
                ],
                tileSize: 256,
                attribution: '&copy; OpenStreetMap Contributors'
            }
        },
        layers: [
            {
                id: 'osm',
                type: 'raster',
                source: 'osm'
            }
        ]
    },

    center: [defaultLng, defaultLat],
    zoom: 13
});

// Navigation Controls
map.addControl(new maplibregl.NavigationControl());

// Marker
let marker = new maplibregl.Marker({
    draggable: true
})
.setLngLat([defaultLng, defaultLat])
.setPopup(
    new maplibregl.Popup().setText("Selected Location")
)
.addTo(map);





    // ==========================
    // RADIUS SETTINGS
    // ==========================

    const radiusInMeters = 5000;

    // Circle Layer
    map.on('load', () => {

        map.addSource('radius-circle', {
            type: 'geojson',
            data: {
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [defaultLng, defaultLat]
                }
            }
        });

        map.addLayer({
            id: 'radius-fill',
            type: 'circle',
            source: 'radius-circle',
            paint: {
                'circle-radius': {
                    stops: [
                        [0, 0],
                        [20, radiusInMeters / 2]
                    ],
                    base: 2
                },
                'circle-color': '#0071bc',
                'circle-opacity': 0.2
            }
        });

    });

    // ==========================
    // SEARCH FUNCTION
    // ==========================

  // ==========================
async function searchLocation() {

    const query = document.getElementById('searchBox').value;

    if (!query) {
        alert('Enter location');
        return;
    }

    try {

        const response = await fetch(
            `/search-location?query=${encodeURIComponent(query)}`
        );

        const data = await response.json();

        console.log(data);

        if (!data.predictions || data.predictions.length === 0) {

            alert('Location not found');
            return;
        }

        const place = data.predictions[0];

        // IMPORTANT
        const lat = place.geometry.location.lat;
        const lng = place.geometry.location.lng;

        map.flyTo({
            center: [lng, lat],
            zoom: 15
        });

        marker.setLngLat([lng, lat]);

    } catch (error) {

        console.error(error);

        alert('Error searching location');
    }
}
    // DISTANCE CALCULATOR
    // ==========================

    function calculateDistance(lat1, lon1, lat2, lon2) {

        const R = 6371e3;

        const φ1 = lat1 * Math.PI/180;
        const φ2 = lat2 * Math.PI/180;

        const Δφ = (lat2-lat1) * Math.PI/180;
        const Δλ = (lon2-lon1) * Math.PI/180;

        const a =
            Math.sin(Δφ/2) * Math.sin(Δφ/2) +
            Math.cos(φ1) * Math.cos(φ2) *
            Math.sin(Δλ/2) * Math.sin(Δλ/2);

        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

        return R * c;
    }

    // ==========================
    // CLICK ON MAP
    // ==========================

    map.on('click', function (e) {

        const lng = e.lngLat.lng;
        const lat = e.lngLat.lat;

        const distance = calculateDistance(
            defaultLat,
            defaultLng,
            lat,
            lng
        );

        if(distance > radiusInMeters){

            alert('Outside allowed radius');

            return;
        }

        marker.setLngLat([lng, lat]);

    });

</script>

</body>
</html>