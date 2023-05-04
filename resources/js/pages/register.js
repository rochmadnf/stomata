import axios from "axios";

const baseUrl = `${location.protocol}//${location.host}`;

async function getRegion() {
    const district = document.querySelector("#district");
    const city = document.querySelector("#city").value;
    const optSubDistrictsEl = document.querySelector("#sub_district");

    optSubDistrictsEl.innerHTML = `<option disabled selected value="null">--Pilih Kelurahan/Desa--</option>`;

    if (district.value !== "null") {
        const subDistricts = await axios.get(`${baseUrl}/api/regions`, {
            params: {
                district: district.value,
                city,
            },
        });

        subDistricts.data.forEach((subDistrict) => {
            optSubDistrictsEl.insertAdjacentHTML(
                "beforeend",
                `<option value="${subDistrict.id}" data-code="${subDistrict.code}">${subDistrict.name}</option>`
            );
        });
    }
}
district.addEventListener("change", () => getRegion());
