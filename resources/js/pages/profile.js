import { Grid } from "gridjs";
import "gridjs/dist/theme/mermaid.css";
import mapboxgl from "mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";

// mapbox view
if (document.querySelector("#coordinateXX")) {
    const coordinates = document.querySelector("#coordinateXX");
    mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
    const defaultCoordinate = [
        coordinates.getAttribute("data-long"),
        coordinates.getAttribute("data-lat"),
    ];
    const map = new mapboxgl.Map({
        container: "mapboxWrapper",
        style: "mapbox://styles/mapbox/streets-v12",
        center: defaultCoordinate,
        zoom: 15,
        doubleClickZoom: false,
    });
    const marker = new mapboxgl.Marker({
        color: "#111827",
    });
    map.addControl(new mapboxgl.NavigationControl());
    marker.remove();
    marker
        .setLngLat([
            coordinates.getAttribute("data-long"),
            coordinates.getAttribute("data-lat"),
        ])
        .setPopup(
            new mapboxgl.Popup({
                closeButton: false,
                closeOnClick: true,
            }).setText("Lokasi Tempat Sampah Kamu")
        )
        .addTo(map);
}

let deviceId, userID, gridJsWrapper;

if (document.getElementById("inDeviceId")) {
    deviceId = Number(document.getElementById("inDeviceId").value);
    userID = document
        .querySelector("span[data-user]")
        .getAttribute("data-user");
    gridJsWrapper = document.getElementById("gridjsWrapper");
}

const grid = new Grid({
    columns: ["Waktu", "Terisi", "Tidak Terisi"],
    server: {
        url: `${import.meta.env.VITE_APP_URL}/api/device-data/${deviceId}`,
        then: (data) =>
            data.map((device) => [
                device.created_at,
                device.filled + "%",
                device.unfilled + "%",
            ]),
    },
    pagination: {
        limit: 10,
        summary: false,
    },
    language: {
        search: {
            placeholder: "🔍 Search...",
        },
        pagination: {
            previous: "⬅️",
            next: "➡️",
            showing: "😃 Menampilkan",
            results: () => "Data",
        },
    },
});

if (deviceId) {
    grid.render(gridJsWrapper);
    Echo.private(`user.${userID}`).listen(
        "UpdateSingleDeviceDataEvent",
        async (e) => {
            console.info("Update Single");

            // update data terkini
            document.querySelector("#colTime").textContent = e.field.created;
            document.querySelector("#colFill").textContent =
                e.field.filled + "%";
            document.querySelector("#colUnfill").textContent =
                e.field.unfilled + "%";

            // update histori data
            grid.forceRender();
        }
    );
}
