import axios from "axios";
import "../mapbox";
import Spinner from "../components/icons/spinner";
import Masker from "vanilla-masker";

import { SwalToast } from "../components/SweetAlert";

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
Masker(document.querySelector("#phone_number")).maskPattern("9999-9999-9999");

const btnSubmit = document.querySelector('#regisForm > button[type="submit"]');
const btnNext = document.querySelector("#next");
const btnPrev = document.querySelector("#prev");
const regisForm = document.getElementById("regisForm");

regisForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const property = new FormData(e.target);
    btnSubmit.setAttribute("disabled", true);
    btnSubmit.innerHTML = Spinner({ class: "w-4 h-4 text-white" });

    await axios
        .post(e.target.action, property)
        .then((res) => {
            location.href = `${baseUrl}/register/success`;
        })
        .catch((err) => {
            // store record fail
            if (document.querySelector("#errorCard"))
                document.querySelector("#errorCard").remove();

            const field = err.response.data.field;
            let errorsField = "";

            for (const key in field) {
                errorsField += `<p class="text-base">➡️ ${field[key]}</p>`;
            }

            document.querySelector("#registerCard > h4").insertAdjacentHTML(
                "afterend",
                `
            <div id="errorCard" class="mt-8 rounded-md bg-red-200 px-4 pt-2 pb-4">
                <h3 class="mb-4 border-b border-b-gray-500 text-lg font-bold">Kesalahan Data</h3>
                ${errorsField}
            </div>`
            );

            document.querySelector("#errorCard").scrollIntoView({
                behavior: "smooth",
            });

            btnSubmit.innerHTML = "Daftar";
            btnSubmit.removeAttribute("disabled");
        });
});

window.addEventListener("load", (ev) => {
    regisForm.reset();
});

function showHide(act) {
    const sAccount = document.getElementById("sAccount");
    const sUserData = document.getElementById("sUserData");

    if (act === "next") {
        sUserData.classList.add("hidden");
        sAccount.classList.remove("hidden");
        btnSubmit.classList.remove("hidden");
        btnPrev.classList.replace("invisible", "visible");
        btnNext.classList.replace("visible", "invisible");
    } else {
        sAccount.classList.add("hidden");
        sUserData.classList.remove("hidden");
        btnSubmit.classList.add("hidden");
        btnPrev.classList.replace("visible", "invisible");
        btnNext.classList.replace("invisible", "visible");
    }
}

btnNext.addEventListener("click", () => {
    const arrayOfUserData = [
        "full_name",
        "phone_number",
        "gender",
        "province",
        "city",
        "address",
        "district",
        "sub_district",
        "long",
        "lat",
    ];

    const userData = new FormData(regisForm);
    let isValid = true;

    arrayOfUserData.forEach((item) => {
        if (!Boolean(userData.get(item))) {
            isValid = false;
            return;
        }
    });

    if (isValid) {
        showHide("next");
    } else {
        SwalToast.error("Galat", "Terdapat data yang belum diisi/dipilih.");
    }
});

btnPrev.addEventListener("click", () => {
    showHide("prev");
});
