
    document.addEventListener('DOMContentLoaded', function() {

        var errorToastElement = document.getElementById('error-toast');
        if (errorToastElement) {
            var errorToast = new bootstrap.Toast(errorToastElement, {
                delay: 3000
            });
            errorToast.show();
        }

        var successToastElement = document.getElementById('success-toast');
        if (successToastElement) {
            var successToast = new bootstrap.Toast(successToastElement, {
                delay: 3000
            });
        successToast.show();
    }
});
