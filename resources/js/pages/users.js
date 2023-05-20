import axios from "axios";
import Swal from "sweetalert2";

const token = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

async function confirmAlert(text, userId, _method) {
    return Swal.fire({
        title: "Apakah anda yakin?",
        text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ef4444",
        cancelButtonColor: "#34d399",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
        showLoaderOnConfirm: true,
        preConfirm: async () => {
            const options = {
                url: `${import.meta.env.VITE_APP_URL}/users/${userId}`,
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                data: {
                    _method,
                    _token: token,
                },
            };

            return await axios
                .request(options)
                .then((response) => {
                    if (response.status !== 200) {
                        throw new Error(response.statusText);
                    }
                    return response.data;
                })
                .catch((error) => {
                    Swal.showValidationMessage(
                        `Galat: ${error.response.data.message}`
                    );
                });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Berhasil", `${result.value.message}`, "success").then(
                (confirmed) => {
                    if (confirmed.isConfirmed) {
                        location.href = window.location.href;
                    }
                }
            );
        }
    });
}

// @method_deleted
document.querySelectorAll('[data-button="delete"]').forEach((btnDelete) => {
    btnDelete.addEventListener("click", async (el) => {
        const item = el.target.closest("button");
        await confirmAlert(
            "Data tidak dapat dikembalikan lagi!",
            item.getAttribute("data-user"),
            "DELETE"
        );
    });
});

document
    .querySelectorAll('[data-button="activation"]')
    .forEach((btnActivation) => {
        btnActivation.addEventListener("click", async (el) => {
            const item = el.target.closest("button");
            await confirmAlert(
                "Anda akan mengaktifkan akun yang dipilih.",
                item.getAttribute("data-user"),
                "PATCH"
            );
        });
    });
