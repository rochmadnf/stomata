import { Grid } from "gridjs";
import "gridjs/dist/theme/mermaid.css";

const deviceId = Number(document.getElementById("inDeviceId").value);

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
