import mapboxgl from "mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";

mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;

const defaultCoordinate = [119.8620751604335, -0.8894968913506887];

const map = new mapboxgl.Map({
    container: "mapbox",
    style: "mapbox://styles/mapbox/streets-v12",
    center: defaultCoordinate,
    zoom: 12,
    doubleClickZoom: false,
});

const marker = new mapboxgl.Marker({
    color: "#EF4444",
    draggable: true,
});

const geolocate = new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true,
    },
    fitBoundsOptions: {
        maxZoom: 18,
    },
    showAccuracyCircle: false,
    showUserLocation: false,
});

map.addControl(new mapboxgl.NavigationControl());
map.addControl(geolocate, "top-left");

geolocate.on("geolocate", (e) => {
    setLngLatToInput(e.coords.longitude, e.coords.latitude);
});

map.on("click", (e) => {
    const coordinate = e.lngLat.wrap();
    setLngLatToInput(coordinate.lng, coordinate.lat);
});

marker.on("dragend", (e) => {
    setLngLatToInput(e.target.getLngLat().lng, e.target.getLngLat().lat);
});

function setLngLatToInput(lng, lat) {
    marker.remove();
    marker.setLngLat([lng, lat]).addTo(map);

    document.querySelector("#long").value = lng;
    document.querySelector("#lat").value = lat;
}
