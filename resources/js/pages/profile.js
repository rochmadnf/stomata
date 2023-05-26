import { Grid } from "gridjs";
import "gridjs/dist/theme/mermaid.css";

const deviceId = Number(document.getElementById("inDeviceId").value);
const userID = document
    .querySelector("span[data-user]")
    .getAttribute("data-user");

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

grid.render(document.getElementById("gridjsWrapper"));

Echo.private(`user.${userID}`).listen(
    "UpdateSingleDeviceDataEvent",
    async (e) => {
        console.info("Update Single");

        // update data terkini
        document.querySelector("#colTime").textContent = e.field.created;
        document.querySelector("#colFill").textContent = e.field.filled + "%";
        document.querySelector("#colUnfill").textContent =
            e.field.unfilled + "%";

        // update histori data
        grid.forceRender();
    }
);
