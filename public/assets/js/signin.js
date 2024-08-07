$(document).on("click", '#show-password', function(){

    if($(this).is(":checked")) {
        $('#password').attr('type', 'text'); 
    }
    else {
        $('#password').attr('type', 'password'); 
    }
});

var SweetAlert = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-danger',
        cancelButton: 'btn btn-secondary ms-3'
    },
    buttonsStyling: false
});

$(document).on('submit', "#sign-in", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Signing In...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/login', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
        SweetAlert.fire({
            position: 'center',
            icon: 'success',
            title: 'Authenticated!',
            html: response.data.Message,
            allowOutsideClick: false,
            showConfirmButton: false
        });
        setTimeout(function() {
            location.reload();
        }, 2000);
    })
    .catch(error => {
        console.error('Error:', error);
        let errorMessage = 'An unknown error occurred';
        if (error.response && error.response.data && error.response.data.Message) {
            errorMessage = error.response.data.Message;
        } else if (error.response && error.response.statusText) {
            errorMessage = error.response.statusText;
        }
        SweetAlert.fire({
            icon: 'error',
            title: 'Log In Failed',
            html: errorMessage,
            confirmButtonColor: "#3a57e8"
        });
    });
});

$(document).on('submit', "#admin-sign-in", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Signing In...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/admin/login', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
        SweetAlert.fire({
            position: 'center',
            icon: 'success',
            title: 'Authenticated!',
            html: response.data.Message,
            allowOutsideClick: false,
            showConfirmButton: false
        });
        setTimeout(function() {
            location.reload();
        }, 2000);
    })
    .catch(error => {
        console.error('Error:', error);
        let errorMessage = 'An unknown error occurred';
        if (error.response && error.response.data && error.response.data.Message) {
            errorMessage = error.response.data.Message;
        } else if (error.response && error.response.statusText) {
            errorMessage = error.response.statusText;
        }
        SweetAlert.fire({
            icon: 'error',
            title: 'Log In Failed',
            html: errorMessage,
            confirmButtonColor: "#3a57e8"
        });
    });
});