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

$(document).on('click', '#add-school', function() {
    $("#createSchoolModal").modal('show');
});

$(document).on('change', '#select-school-level', function() {
    var value = $(this).val();

    if(value == 1) {
        $(".show-elementary-school").show(200);
        $(".show-high-school").hide(200);
        $(".show-senior-high-school").hide(200);
    }
    if(value == 2) {
        $(".show-elementary-school").hide(200);
        $(".show-high-school").show(200);
        $(".show-senior-high-school").hide(200);
    }
    if(value == 3) {
        $(".show-elementary-school").hide(200);
        $(".show-high-school").hide(200);
        $(".show-senior-high-school").show(200);
    }
});

$(document).on('change', '#shs-available', function() {
    if(this.checked){
        $(".show-strands").show(200);
    }
     else {
        $(".show-strands").hide(200);
     }
});

$(document).on('change', '#year-offered', function() {
    var value = $(this).val();

    if(value == 1) {
        $(".show-year-semester").show(200);
        $(".show-year").hide(200);
    }
    if(value == 2) {
        $(".show-year-semester").hide(200);
        $(".show-year").show(200);
    }
    if(value == 3) {
        $(".show-year-semester").hide(200);
        $(".show-year").hide(200);
    }
});

$(document).on('change', '#edit-shs-year-offered', function() {
    var value = $(this).val();

    if(value == 1) {
        $(".edit-shs-show-year-semester").show(200);
        $(".edit-shs-show-year").hide(200);
    }
    if(value == 2) {
        $(".edit-shs-show-year-semester").hide(200);
        $(".edit-shs-show-year").show(200);
    }
    if(value == 3) {
        $(".edit-shs-show-year-semester").hide(200);
        $(".edit-shs-show-year").hide(200);
    }
});


$(document).on('submit', "#create-school", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/school', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createSchoolModal").modal('hide');
        $('input').val('');
        $('select').val('');
        $('#elementary-school-data-result').html(response.data.elemSchools);
        $('#high-school-data-result').html(response.data.highSchools);
        SweetAlert.fire({
            icon: 'success',
            title: 'Done',
            text: 'School Added Successfully',
            confirmButtonColor: "#3a57e8"
        });
    })
    .catch(error => {
        console.error('Error:', error);
        SweetAlert.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email is already taken',
            confirmButtonColor: "#3a57e8"
        });
    });
});

$(document).on('submit', "#update-school", function(e){
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
        return await axios.post('/api/update/school', formData, {
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
            text: 'School updated Successfully',
            confirmButtonColor: "#3a57e8"
        }).then(() => {
            location.reload();
        });
    })
    .catch(error => {
        console.error('Error:', error);
        SweetAlert.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email is already taken',
            confirmButtonColor: "#3a57e8"
        });
    });
});

$(document).on('click', "#delete-school", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the school permanently including its data.",
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
                id: $(this).parents('tr').find('td[id]').attr("id"),
                school: $(this).parents('tr').find('td[school]').attr("school")
            };
            
            async function APIrequest() {
                return await axios.delete('/api/delete/school', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#elementary-school-data-result').html(response.data.elemSchools);
                $('#high-school-data-result').html(response.data.highSchools);
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

$(document).on('click', '#add-elementary-subject', function() {
    $("#createElementarySubjectModal").modal('show');
});

$(document).on('submit', "#create-elementary-subject", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/elementary-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createElementarySubjectModal").modal('hide');
        $('input').val('');
        $('#elementary-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#edit-elementary-subject", function(e){

    var id = $(this).parents('tr').find('td[id]').attr("id");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    $("#edit-elem-id").val(id);
    $("#edit-elem-subject").val(subject);

    $("#editElementarySubjectModal").modal('show');
});

$(document).on('submit', "#update-elementary-subject", function(e){
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
        return await axios.post('/api/update/elementary-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editElementarySubjectModal").modal('hide');
        $('input').val('');
        $('#elementary-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#delete-elementary-subject", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the subject permanently.",
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
            const data = {id: $(this).parents('tr').find('td[id]').attr("id")};
            async function APIrequest() {
                return await axios.delete('/api/delete/elementary-subject', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#elementary-subject-data-result').html(response.data.Subjects);
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

$(document).on('click', '#add-high-school-subject', function() {
    $("#createHighSchoolSubjectModal").modal('show');
});

$(document).on('submit', "#create-high-school-subject", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/high-school-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createHighSchoolSubjectModal").modal('hide');
        $('input').val('');
        $('#high-school-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#edit-high-school-subject", function(e){

    var id = $(this).parents('tr').find('td[id]').attr("id");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    $("#edit-hs-id").val(id);
    $("#edit-hs-subject").val(subject);

    $("#editHighSchoolSubjectModal").modal('show');
});

$(document).on('submit', "#update-high-school-subject", function(e){
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
        return await axios.post('/api/update/high-school-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editHighSchoolSubjectModal").modal('hide');
        $('input').val('');
        $('#high-school-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#delete-high-school-subject", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the subject permanently.",
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
            const data = {id: $(this).parents('tr').find('td[id]').attr("id")};
            async function APIrequest() {
                return await axios.delete('/api/delete/high-school-subject', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#high-school-subject-data-result').html(response.data.Subjects);
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

$(document).on('click', '#add-tle-tve-subject', function() {
    $("#createTLETVESubjectModal").modal('show');
});

$(document).on('submit', "#create-tle-tve-subject", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/tle-tve-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createTLETVESubjectModal").modal('hide');
        $('input').val('');
        $('#tle-tve-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#edit-tle-tve-subject", function(e){

    var id = $(this).parents('tr').find('td[id]').attr("id");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    $("#edit-tle-id").val(id);
    $("#edit-tle-subject").val(subject);

    $("#editTLETVESubjectModal").modal('show');
});

$(document).on('submit', "#update-tle-tve-subject", function(e){
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
        return await axios.post('/api/update/tle-tve-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editTLETVESubjectModal").modal('hide');
        $('input').val('');
        $('#tle-tve-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#delete-tle-tve-subject", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the subject permanently.",
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
            const data = {id: $(this).parents('tr').find('td[id]').attr("id")};
            async function APIrequest() {
                return await axios.delete('/api/delete/tle-tve-subject', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#tle-tve-subject-data-result').html(response.data.Subjects);
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

$(document).on('click', '#add-senior-high-school-subject', function() {
    $("#createSeniorHighSchoolSubjectModal").modal('show');
});

$(document).on('submit', "#create-senior-high-school-subject", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/senior-high-school-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createSeniorHighSchoolSubjectModal").modal('hide');
        $('input').val('');
        $('select').val('');
        $('#senior-high-school-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#edit-senior-high-school-subject", function(e){

    var id = $(this).parents('tr').find('td[id]').attr("id");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    var semester = $(this).parents('tr').find('td[semester]').attr("semester");

    $("#edit-shs-id").val(id);
    $("#edit-shs-subject").val(subject);
    $("#edit-shs-year-level").val(yearLevel);
    $("#edit-shs-semester").val(semester);

    $("#editSeniorHighSchoolSubjectModal").modal('show');
});

$(document).on('submit', "#update-senior-high-school-subject", function(e){
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
        return await axios.post('/api/update/senior-high-school-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editSeniorHighSchoolSubjectModal").modal('hide');
        $('input').val('');
        $('select').val('');
        $('#senior-high-school-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#delete-senior-high-school-subject", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the subject permanently.",
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
            const data = {id: $(this).parents('tr').find('td[id]').attr("id")};
            async function APIrequest() {
                return await axios.delete('/api/delete/senior-high-school-subject', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#senior-high-school-subject-data-result').html(response.data.Subjects);
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

$(document).on('click', '#add-strand-subject', function() {
    $("#createStrandSubjectModal").modal('show');
});

$(document).on('submit', "#create-strand-subject", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/strand-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createStrandSubjectModal").modal('hide');
        $('input').val('');
        $('select').val('');
        $('#strand-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#edit-strand-subject", function(e){

    var id = $(this).parents('tr').find('td[id]').attr("id");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    var semester = $(this).parents('tr').find('td[semester]').attr("semester");
    var yearOffered = $(this).parents('tr').find('td[yearOffered]').attr("yearOffered");

    if(yearLevel == '' && semester == '') {
        $("#edit-shs-strand-id").val(id);
        $("#edit-shs-strand-subject").val(subject);
        $(".edit-shs-show-year").hide();
        $(".edit-shs-show-year-semester").hide();
        $("#edit-shs-year-offered").val(yearOffered);
    }
    if(yearLevel != '' && semester == '') {
        $("#edit-shs-strand-id").val(id);
        $("#edit-shs-strand-subject").val(subject);
        $(".edit-shs-show-year").show();
        $(".edit-shs-show-year-semester").hide();
        $("#edit-shs-strand-year").val(yearLevel);
        $("#edit-shs-year-offered").val(yearOffered);
    }
    if(yearLevel != '' && semester != '') {
        $("#edit-shs-strand-id").val(id);
        $("#edit-shs-strand-subject").val(subject);
        $(".edit-shs-show-year").hide();
        $(".edit-shs-show-year-semester").show();
        $("#edit-shs-strand-year-semester").val(yearLevel);
        $("#edit-shs-strand-year-select-semester").val(semester);
        $("#edit-shs-year-offered").val(yearOffered);
    }

    $("#editStrandSubjectModal").modal('show');
});

$(document).on('submit', "#update-strand-subject", function(e){
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
        return await axios.post('/api/update/strand-subject', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editStrandSubjectModal").modal('hide');
        $('input').val('');
        $('#strand-subject-data-result').html(response.data.Subjects);
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
});

$(document).on('click', "#delete-strand-subject", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the strand permanently.",
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
            const data = {id: $(this).parents('tr').find('td[id]').attr("id")};
            async function APIrequest() {
                return await axios.delete('/api/delete/strand-subject', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#strand-subject-data-result').html(response.data.Subjects);
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

$(document).on('submit', "#search-elementary-school", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Retrieving...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/search/elementary-school', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
        window.location.href="/elementary-schools/" + response.data.QueryParameters;
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
});



$(document).on('submit', "#search-high-school", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Retrieving...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/search/high-school', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
        window.location.href="/high-schools/" + response.data.QueryParameters;
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
});

$(document).on('click', "#new-school-year", function(e){
    SweetAlert.fire({
        icon: 'info',
        title: 'Are you sure?',
        text: "This will create a new academic year for schools.",
        showCancelButton: true,
        confirmButtonColor: '#160e45',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Create!'
    }).then((result) => {
        if (result.value) {
            SweetAlert.fire({
                position: 'center',
                icon: 'info',
                title: 'Processing...',
                html: `<span class="text-sm">Please wait for a moment, this may take for a while</span>`,
                allowOutsideClick: false,
                showConfirmButton: false
            });
            const formData = new FormData();
            formData.append('year', true);
            async function APIrequest() {
                return await axios.post('/api/create/school-year', formData, {
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
                    text: response.data.Message,
                    confirmButtonColor: "#3a57e8"
                }).then(function(){ 
                    location.reload();
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

$(document).on('submit', "#search-elementary-school-teachers", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Retrieving...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/search/elementary-school-teachers', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
        if(response.data.Path == 1)
            window.location.href = '/teachers';
        if(response.data.Path == 2)
           location.reload();
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
});

$(document).on('submit', "#search-high-school-teachers", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Retrieving...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/search/high-school-teachers', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
        if(response.data.Path == 1)
            window.location.href = '/teachers';
        if(response.data.Path == 2)
            location.reload();
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
});

$(document).on('submit', "#search-high-school-teachers-documents", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Retrieving...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/search/high-school-teachers', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
        window.location.href = '/documents';
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
});

$(document).on('click', '#request-documents', function() {
    $("#createRequestDocumentModal").modal('show');
});

$(document).on('submit', "#create-request-documents", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/request-documents', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createRequestDocumentModal").modal('hide');
        $('input').val('');
        $('select').val('');
        $('#request-documents-data-result').html(response.data.RequestDocuments);
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
});

$(document).on('click', '#edit-request-documents', function() {
    var id = $(this).parents('tr').find('td[id]').attr("id");
    var description = $(this).parents('tr').find('td[description]').attr("description");
    var position = $(this).parents('tr').find('td[position]').attr("position");

    $("#edit-id").val(id);
    $("#edit-description").val(description);
    $("#edit-position").val(position);

    $("#editRequestDocumentModal").modal('show');
});

$(document).on('submit', "#update-request-documents", function(e){
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
        return await axios.post('/api/update/request-documents', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editRequestDocumentModal").modal('hide');
        $('#request-documents-data-result').html(response.data.RequestDocuments);
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
});

$(document).on('click', "#delete-request-documents", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the requested documents including the attachments submitted by teachers permanently.",
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
            const data = {id: $(this).parents('tr').find('td[id]').attr("id")};
            async function APIrequest() {
                return await axios.delete('/api/delete/request-documents', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#request-documents-data-result').html(response.data.RequestDocuments);
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

$(document).on('click', '#view-elem-school', function() {
    var popupContent = $(this).closest('.leaflet-popup-content');
    var schoolInput = popupContent.find('[name="school"]');
    var yearInput = popupContent.find('[name="year"]');
    
    var schoolId = schoolInput.val();
    var year = yearInput.val();

    $("#elem-school-id").val(schoolId);
    $("#elem-school-teachers-id").val(schoolId);
    $("#elem-school-year").val(year);

    var link = $('#elem-school-documents-link');
    link.attr('href', link.attr('href').replace(':id', schoolId));

    $("#viewElemSchoolModal").modal('show');
});

$(document).on('click', '#view-high-school', function() {
    var popupContent = $(this).closest('.leaflet-popup-content');
    var schoolInput = popupContent.find('[name="school"]');
    var yearInput = popupContent.find('[name="year"]');
    
    var schoolId = schoolInput.val();
    var year = yearInput.val();

    $("#high-school-id").val(schoolId);
    $("#high-school-teachers-id").val(schoolId);
    $("#high-school-year").val(year);

    var link = $('#high-school-documents-link');
    link.attr('href', link.attr('href').replace(':id', schoolId));

    $("#viewHighSchoolModal").modal('show');
});

$(document).on('submit', "#update-admin-account", function(e){
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
        return await axios.post('/api/update/admin-account', formData, {
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

$(document).on('submit', "#upload-face-auth", function(e){
    e.preventDefault();
    SweetAlert.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });
    const formData = new FormData(this);
    async function APIrequest() {
        return await axios.post('/api/create/face-auth', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {

        $('input').val('');
        
        SweetAlert.fire({
            icon: 'success',
            title: 'Done',
            text: 'Face has been registered successfully. You can now use the face authentication during login',
            confirmButtonColor: "#3a57e8"
        });
    })
    .catch(error => {
        console.error('Error:', error);
        SweetAlert.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Picture must be a jpg file',
            confirmButtonColor: "#3a57e8"
        });
    });
});

$(document).on('click', '#download-pdf', function() {
    var quarter = $(this).data('quarter');
    var name = $(this).data('quarter-name');

    $('#quarter-data').val(quarter);
    $('#quarter-data-name').val(name);

    $('#selectTeacherModal').modal('show');
})

$(document).on('click', '#proceed-download-pdf', function() {
    var id = $('#subjectID').val();
    var type = $('#type').val();
    var type2 = $('#type2').val();
    var quarter = $('#quarter-data').val();
    var name = $('#quarter-data-name').val();
    var yearLevel = $('#year-level').text()
    var subject = $('#subject-name').text();
    var teacher = $('#teacher-name').val();
    var schoolType = $('#schoolType').val();

    const formData = new FormData();
    formData.append('id', id);
    formData.append('type', type);
    formData.append('type2', type2);
    formData.append('quarter', quarter);
    formData.append('teacher', teacher);
    formData.append('schoolType', schoolType);

    Swal.fire({
        position: 'center',
        icon: 'info',
        title: 'Processing...',
        allowOutsideClick: false,
        showConfirmButton: false
    });

    if(teacher == '') {
        SweetAlert.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Subject teacher is requied',
            confirmButtonColor: "#3a57e8"
        });
        return false;
    }

    axios.post('/download-promeds', formData, {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    }).then(function(response) {
        var data = response.data;
        var tempDiv = $('<div></div>').html(data);

        var style = `
            <style>
                #body-content {
                    font-size: 10px;
                }
               
            </style>`;
        tempDiv.prepend(style);

        $('#content').append(tempDiv);

        html2pdf().from(tempDiv[0]).set({
            margin: 0.5,
            filename: 'Grade ' + yearLevel + '-' + subject + '-' + name + '-promeds.pdf',
            html2canvas: { scale: 5 },
            jsPDF: { orientation: 'landscape', unit: 'in', format: 'a4' }
        }).save().then(function () {
            tempDiv.remove();
        });

        Swal.close();
        $('#selectTeacherModal').modal('hide');
    }).catch(function(error) {
        console.error('Error fetching the content:', error);
        Swal.close();
    });
});