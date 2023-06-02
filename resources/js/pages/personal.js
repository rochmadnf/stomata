import axios from "axios";
import Masker from "vanilla-masker";

if (document.querySelector("input#data_edit")) {
    Masker(document.querySelector("input#data_edit")).maskPattern(
        "9999-9999-99999"
    );
}

let district = document.querySelector("#district");

async function getRegion() {
    district = document.querySelector("#district");
    const city = 71;
    const optSubDistrictsEl = document.querySelector("#data_edit");

    optSubDistrictsEl.innerHTML = `<option disabled selected>--Pilih Kelurahan/Desa--</option>`;

    if (district.value !== "null") {
        const subDistricts = await axios.get(
            `${import.meta.env.VITE_APP_URL}/api/regions`,
            {
                params: {
                    district: district.value,
                    city,
                },
            }
        );

        subDistricts.data.forEach((subDistrict) => {
            optSubDistrictsEl.insertAdjacentHTML(
                "beforeend",
                `<option value="${subDistrict.id}" data-code="${subDistrict.code}">${subDistrict.name}</option>`
            );
        });
    }
}
district.addEventListener("change", () => getRegion());
