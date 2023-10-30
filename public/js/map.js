var mapElement = document.getElementById('map');
var latitude = mapElement.getAttribute('data-latitude');
var longitude = mapElement.getAttribute('data-longitude');

var map = L.map('map', {
    center: [latitude, longitude],
    zoom: 17
});
 

// Create a Tile Layer and add it to the map
var tiles = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: '15'
}).addTo(map);

var redIcon = new L.Icon ( {
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
  
L.marker (
    [latitude, longitude], 
    {
        icon: redIcon
    }
).addTo(map);
