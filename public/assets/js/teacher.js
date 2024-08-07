$.ajaxSetup({
    headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    headers: {  "Authorization": "Bearer " + $('meta[name="token"]').attr('content') }
});


var SweetAlert = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-danger',
        cancelButton: 'btn btn-secondary ms-3'
    },
    buttonsStyling: false
});

document.addEventListener('livewire:navigated', () => { 

    var selectedFiles = selectedFiles || [];

    $('#file-input').on('change', function() {
        $.each(this.files, function(index, file) {
            if (!selectedFiles.map(f => f.name).includes(file.name)) {
                selectedFiles.push(file);
            }
        });
        updateFileList();
    });

    $('#add-more-files').on('click', function() {
        $('#file-input').click();
    });

    $('#upload-attachments').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData();
        $.each(selectedFiles, function(index, file) {
            formData.append('files[]', file);
        });

        if(selectedFiles == '') {
            SweetAlert.fire({
                icon: 'error',
                title: 'Empty Submission',
                text: "Please select file/s to upload",
                confirmButtonColor: "#3a57e8"
            });
        }
        else {
            var id = $("#id").val();
            formData.append('id', id);
            console.log(formData);
            SweetAlert.fire({
                icon: 'info',
                title: 'Submit?',
                text: "This will submit your attachments to the administrator.",
                showCancelButton: true,
                confirmButtonColor: '#160e45',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Upload!'
            }).then((result) => {
                if (result.value) {
                    SweetAlert.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'Uploading...',
                        allowOutsideClick: false,
                        showConfirmButton: false
                    });
                    async function APIrequest() {
                        return await axios.post('/api/create/upload-attacments', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                            }
                        })
                    }
                    APIrequest().then(response => {
                            $("#attacments-data-result").html(response.data.Attachments);
                            $("#file-list").html('');
                            $("#file-list li").html('');
                            $("#file-input").val('');
                            selectedFiles = [];
                            SweetAlert.fire({
                                icon: 'success',
                                title: 'Done',
                                text: response.data.Message,
                                confirmButtonColor: "#3a57e8"
                            });
                    });
                }
            });
        }
    });

    function updateFileList() {
        var $listElement = $('#file-list');
        $listElement.empty();
        $.each(selectedFiles, function(index, file) {
            var $li = $('<li class="text-sm">');
            var $icon = $(`
            <span class="ms-3" style="vertical-align: middle;">
                <lord-icon
                    src="https://cdn.lordicon.com/yqiuuheo.json"
                    trigger="in"
                    delay="0"
                    state="in-unfold"
                    colors="primary:#ffffff,secondary:#66d7ee"
                    style="width:25px;height:25px">
                </lord-icon>
            </span>
            `);
            $li.append($icon);
            $li.append(document.createTextNode(` ${file.name}`));
            $listElement.append($li);
        });
    }

});

$(document).on('click', "#delete-attachment", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the attachment permanently.",
        showCancelButton: true,
        confirmButtonColor: '#160e45',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
        if (result.value) {
            SweetAlert.fire({
                position: 'center',
                icon: 'info',
                title: 'Processing...',
                allowOutsideClick: false,
                showConfirmButton: false
            });
            const data = {
                attachmentID: $(this).closest('li').data('value'),
                id: $("#id").val()
            };
            async function APIrequest() {
                return await axios.delete('/api/delete/attachments', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $("#attacments-data-result").html(response.data.Attachments);
                SweetAlert.fire({
                    icon: 'success',
                    title: 'Done',
                    text: response.data.Message,
                    confirmButtonColor: "#3a57e8"
                });
            })
            .catch(error => {
                console.error('Error:', error);
                SweetAlert.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    confirmButtonColor: "#3a57e8"
                });
            });
        }
    });
});

$(document).on('submit', "#update-teacher-account", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    formData.append('_method', 'PATCH');
    async function APIrequest() {
        return await axios.post('/api/update/teacher-account', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        SweetAlert.fire({
            icon: 'success',
            title: 'Done',
            text: 'Account updated Successfully',
            confirmButtonColor: "#3a57e8"
        });
    })
    .catch(error => {
        console.error('Error:', error);
        SweetAlert.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Username is already taken',
            confirmButtonColor: "#3a57e8"
        });
    });
});