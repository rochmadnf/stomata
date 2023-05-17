import axios from "axios";
import "../mapbox";
import Spinner from "../components/icons/spinner";
import Masker from "vanilla-masker";
import Toast from "toastify-js";
import "toastify-js/src/toastify.css";

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
        .then((res) => console.log(res))
        .catch(() => {
            btnSubmit.innerHTML = "Daftar";
            btnSubmit.removeAttribute("disabled");
        });
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
        btnNext.classList.replace("invisible", "visibile");
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
            console.log("berhenti");
            isValid = false;
            return;
        }
    });

    if (isValid) {
        console.log(arrayOfUserData[7], userData.get(arrayOfUserData[7]));

        console.log(userData);
        showHide("next");
    } else {
        Toast({
            text: "Terdapat data yang belum diisi/dipilih.",
            close: true,
            position: "center",
            duration: 5000,
            stopOnFocus: true,
            style: {
                color: "rgb(255 255 255/1)",
                fontWeight: 500,
                fontSize: ".875rem",
                lineHeight: "1.25rem",
                backgroundImage:
                    "linear-gradient(to right, #f98080 0%, #f05252 65%, #e02424 100%)",
                borderRadius: "8px",
            },
        }).showToast();
    }
});

btnPrev.addEventListener("click", () => {
    showHide("prev");
});
