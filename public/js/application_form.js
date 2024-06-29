function showToast() {
    Swal.fire({
        toast: true,
        icon: 'success',
        title: 'Toast Notification',
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000 // Duration in milliseconds
    });
}
