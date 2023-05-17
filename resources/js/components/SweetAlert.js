import Swal from "sweetalert2";

const SwalToast = {
    default: {
        toast: true,
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        color: "#fff",
        iconColor: "#fff",
    },
    error: function (title, text, position = "top") {
        const opt = {
            icon: "error",
            background: "#f87171",
        };
        return Swal.fire({ ...this.default, ...opt, title, text, position });
    },
    success: function (title, text, position = "top") {
        const opt = {
            icon: "success",
            background: "#34d399",
        };
        return Swal.fire({ ...this.default, ...opt, title, text, position });
    },
    info: function (title, text, position = "top") {
        const opt = {
            icon: "info",
            background: "#0ea5e9",
        };
        return Swal.fire({ ...this.default, ...opt, title, text, position });
    },
};

export { SwalToast };
