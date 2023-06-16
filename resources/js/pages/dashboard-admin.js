import axios from "axios";
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

let markers = [];

const setMarker = async () => {
    const users = await axios.get(
        `${import.meta.env.VITE_APP_URL}/api/user-coords`
    );

    users.data.forEach((user) => {
        let markerColor = "";
        const filledSpace = user?.device?.last_device_data?.filled ?? 0;

        // color
        if (filledSpace > 75) {
            markerColor = "#EF4444";
        } else if (filledSpace >= 35 && filledSpace <= 75) {
            markerColor = "#FACC15";
        } else {
            markerColor = "#6EE7B7";
        }

        markers.push({
            deviceToken: user?.device?.token,
            element: new mapboxgl.Marker({
                color: markerColor,
            })
                .setLngLat([user.long, user.lat])
                .setPopup(
                    new mapboxgl.Popup({
                        closeButton: true,
                        closeOnClick: true,
                        focusAfterOpen: false,
                        maxWidth: "none",
                        offset: 35,
                    }).setHTML(
                        `<div class="flex flex-col gap-2 justify-center items-center">
                        <a href="${import.meta.env.VITE_APP_URL}/profile/${
                            user.id
                        }#deviceInfo" class="text-lg select-none cursor-pointer hover:text-green-500 hover:border-b-green-500 text-gray-900 border-b-2 border-b-gray-700">
                        ${user.full_name}</a>
                        <p>${user.address}</p>
                        <div class="flex gap-2 border border-slate-300 py-1 px-2 rounded-md">
                            <p class="text-xs">Terisi: <strong class="font-bold text-gray-900">${filledSpace.replace(
                                ".",
                                ","
                            )}%</strong></p>
                            <p class="text-xs">Kosong: <strong class="font-bold text-gray-900">${
                                user?.device?.last_device_data?.unfilled.replace(
                                    ".",
                                    ","
                                ) ?? 0
                            }%</strong></p>
                        </div>
                    </div>
                    `
                    )
                )
                .addTo(map),
        });
    });
};

// listen event from pusher
Echo.channel(`update-device-data`).listen(
    "UpdateDeviceDataEvent",
    async (e) => {
        console.info(e.message);
        if (markers.length > 0)
            markers.forEach((marker) => marker.element.remove());

        await setMarker();
    }
);

map.addControl(new mapboxgl.NavigationControl());

window.addEventListener("load", async () => {
    await setMarker();
});
