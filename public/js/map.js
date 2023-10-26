var map = L.map('map', {
    center: [42.27370307120102, 2.964626881265565],
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
    [42.27370307120102, 2.964626881265565], 
    {
        icon: redIcon
    }
).addTo(map);
