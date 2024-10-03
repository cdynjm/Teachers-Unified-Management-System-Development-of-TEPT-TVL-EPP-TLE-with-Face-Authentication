$(document).on('click', "#view-map", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing Map...',
        html: '<span class="text-sm">Please wait, this may take for a while</span>',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData();
    formData.append('view', true);
    async function APIrequest() {
        return await axios.post('/api/view-map', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        if(response.data.View == true) {
            window.location.href="/map";
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});