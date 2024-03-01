var SuccessMessage = Swal.mixin({
    toast: true,
    icon: "success",
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

var WarningMessage = Swal.mixin({
    toast: true,
    icon: "warning",
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

var ErrorMessage = Swal.mixin({
    toast: true,
    icon: "error",
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

window.livewire.on("showSuccessMessage", (message) => {
    SuccessMessage.fire({ title: message });
});

window.livewire.on("showWarningMessage", (message) => {
    WarningMessage.fire({ title: message });
});

window.livewire.on("showErrorMessage", (message) => {
    ErrorMessage.fire({ title: message });
});