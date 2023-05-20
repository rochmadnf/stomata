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

map.addControl(new mapboxgl.NavigationControl());

window.addEventListener("load", async () => {
    const users = await axios.get(
        `${import.meta.env.VITE_APP_URL}/api/user-coords`
    );

    users.data.forEach((user) => {
        new mapboxgl.Marker({
            color: "#EF4444",
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
                        <strong class="text-lg select-none cursor-pointer hover:text-green-500 hover:border-b-green-500 text-gray-900 border-b-2 border-b-gray-700">${
                            user.full_name
                        }</strong>
                        <p>${user.address}</p>
                        <div class="flex gap-2 border border-slate-300 py-1 px-2 rounded-md">
                            <p class="text-xs">Terisi: <strong class="font-bold text-gray-900">${
                                user.device.last_device_data?.filled ?? 0
                            }%</strong></p>
                            <p class="text-xs">Kosong: <strong class="font-bold text-gray-900">${
                                user.device.last_device_data?.unfilled ?? 0
                            }%</strong></p>
                        </div>
                    </div>
                    `
                )
            )
            .addTo(map);
    });
    console.log("load");
});
