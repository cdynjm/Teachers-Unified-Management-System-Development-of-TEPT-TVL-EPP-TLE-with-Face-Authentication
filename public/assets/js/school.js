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

$(document).on('keyup', '#totalScore', function() {
    var totalScore = $('#totalScore').val();
    var totalStudents = $('#totalStudents').val();
    var result = 0;

    result = (totalScore / totalStudents) * 100;

    $('#totalMPS').val(result);
});

$(document).on('keyup', '#totalStudents', function() {
    var totalScore = $('#totalScore').val();
    var totalStudents = $('#totalStudents').val();
    var result = 0;

    result = (totalScore / totalStudents);

    $('#totalMPS').val(result);
});

$(document).on('click', '#edit-elementary-subject-mps', function() {
    var id = $(this).parents('tr').find('td[id]').attr("id");
    var schoolID = $(this).parents('tr').find('td[schoolID]').attr("schoolID");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    var first = $(this).parents('tr').find('td[first]').attr("first");
    var second = $(this).parents('tr').find('td[second]').attr("second");
    var third = $(this).parents('tr').find('td[third]').attr("third");
    var fourth = $(this).parents('tr').find('td[fourth]').attr("fourth");

    $("#edit-elem-mps-id").val(id);
    $("#edit-elem-school-id").val(schoolID);
    $("#edit-elem-subject").val('Grade ' + yearLevel + ' - ' + subject);
    $("#edit-elem-first").val(first);
    $("#edit-elem-second").val(second);
    $("#edit-elem-third").val(third);
    $("#edit-elem-fourth").val(fourth);


    $("#editElementarySubjectMPSModal").modal('show');
});

$(document).on('submit', "#update-elementary-subject-mps", function(e){
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
        return await axios.post('/api/update/elementary-subject-mps', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editElementarySubjectMPSModal").modal('hide');
        $('#elementary-school-mps-data-result').html(response.data.SchoolMPS);
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

$(document).on('click', '#edit-high-school-subject-mps', function() {
    var id = $(this).parents('tr').find('td[id]').attr("id");
    var schoolID = $(this).parents('tr').find('td[schoolID]').attr("schoolID");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    var first = $(this).parents('tr').find('td[first]').attr("first");
    var second = $(this).parents('tr').find('td[second]').attr("second");
    var third = $(this).parents('tr').find('td[third]').attr("third");
    var fourth = $(this).parents('tr').find('td[fourth]').attr("fourth");

    $("#edit-hs-mps-id").val(id);
    $("#edit-hs-school-id").val(schoolID);
    $("#edit-high-school-subject").val('Grade ' + yearLevel + ' - ' + subject);
    $("#edit-hs-first").val(first);
    $("#edit-hs-second").val(second);
    $("#edit-hs-third").val(third);
    $("#edit-hs-fourth").val(fourth);


    $("#editHighSchoolSubjectMPSModal").modal('show');
});

$(document).on('submit', "#update-high-school-subject-mps", function(e){
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
        return await axios.post('/api/update/high-school-subject-mps', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editHighSchoolSubjectMPSModal").modal('hide');
        $('#high-school-mps-data-result').html(response.data.SchoolMPS);
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

$(document).on('click', '#edit-senior-high-school-subject-mps', function() {
    var id = $(this).parents('tr').find('td[id]').attr("id");
    var schoolID = $(this).parents('tr').find('td[schoolID]').attr("schoolID");
    var subject = $(this).parents('tr').find('td[subject]').attr("subject");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    var first = $(this).parents('tr').find('td[first]').attr("first");
    var second = $(this).parents('tr').find('td[second]').attr("second");
    var third = $(this).parents('tr').find('td[third]').attr("third");
    var fourth = $(this).parents('tr').find('td[fourth]').attr("fourth");
    var semester = $(this).parents('tr').find('td[semester]').attr("semester");

    $("#edit-shs-mps-id").val(id);
    $("#edit-shs-school-id").val(schoolID);
    $("#edit-senior-high-school-subject").val('Grade ' + yearLevel + ' - ' + subject);

    if(semester == 1) {

        $("#edit-shs-first").val(first);
        $("#edit-shs-second").val(second);
        $("#edit-shs-semester").val(semester);
        $(".show-midterm").show();
        $(".show-final-term").hide();
    }
    if(semester == 2) {

        $("#edit-shs-third").val(third);
        $("#edit-shs-fourth").val(fourth);
        $("#edit-shs-semester").val(semester);
        $(".show-midterm").hide();
        $(".show-final-term").show();
    }

    $("#editSeniorHighSchoolSubjectMPSModal").modal('show');
});

$(document).on('submit', "#update-senior-high-school-subject-mps", function(e){
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
        return await axios.post('/api/update/senior-high-school-subject-mps', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editSeniorHighSchoolSubjectMPSModal").modal('hide');
        $('#senior-high-school-mps-data-result').html(response.data.SchoolMPS);
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

$(document).on('click', '#edit-elementary-total-students', function() {
    var schoolID = $(this).parents('tr').find('td[schoolID]').attr("schoolID");
    var students = $(this).parents('tr').find('td[students]').attr("students");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    

    $("#edit-total-elem-school-id").val(schoolID);
    $("#edit-total-elem-year-level").val(yearLevel);
    $("#edit-elem-total-students").val(students);

    $("#editElementaryTotalStudentsModal").modal('show');
});

$(document).on('submit', "#update-elem-total-students", function(e){
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
        return await axios.post('/api/update/elem-total-students', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editElementaryTotalStudentsModal").modal('hide');
        $('#elementary-school-mps-data-result').html(response.data.SchoolMPS);
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

$(document).on('click', '#edit-high-school-total-students', function() {
    var schoolID = $(this).parents('tr').find('td[schoolID]').attr("schoolID");
    var students = $(this).parents('tr').find('td[students]').attr("students");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    

    $("#edit-total-hs-school-id").val(schoolID);
    $("#edit-total-hs-year-level").val(yearLevel);
    $("#edit-hs-total-students").val(students);

    $("#editHighSchoolTotalStudentsModal").modal('show');
});

$(document).on('submit', "#update-high-school-total-students", function(e){
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
        return await axios.post('/api/update/hs-total-students', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editHighSchoolTotalStudentsModal").modal('hide');
        $('#high-school-mps-data-result').html(response.data.SchoolMPS);
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

$(document).on('click', '#edit-senior-high-school-total-students', function() {
    var schoolID = $(this).parents('tr').find('td[schoolID]').attr("schoolID");
    var students = $(this).parents('tr').find('td[students]').attr("students");
    var yearLevel = $(this).parents('tr').find('td[yearLevel]').attr("yearLevel");
    

    $("#edit-total-shs-school-id").val(schoolID);
    $("#edit-total-shs-year-level").val(yearLevel);
    $("#edit-shs-total-students").val(students);

    $("#editSeniorHighSchoolTotalStudentsModal").modal('show');
});

$(document).on('submit', "#update-senior-high-school-total-students", function(e){
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
        return await axios.post('/api/update/shs-total-students', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editSeniorHighSchoolTotalStudentsModal").modal('hide');
        $('#senior-high-school-mps-data-result').html(response.data.SchoolMPS);
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
        return await axios.post('/user/search/elementary-school', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
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
        return await axios.post('/user/search/high-school', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    }
    APIrequest().then(response => {
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

$(document).on('click', '#add-teacher', function() {
    $("#createTeacherModal").modal('show');
});

$(document).on('submit', "#create-teacher", function(e){
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
        return await axios.post('/api/create/teacher', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createTeacherModal").modal('hide');
        $('input').val('');
        $('select').val('');
        $("#add-profile-photo").val('');
        $('#create-profile-photo').attr('src', '/storage/icons/profile-placeholder.jpg'); 
        $('#teachers-data-result').html(response.data.Teachers);
        SweetAlert.fire({
            icon: 'success',
            title: 'Done',
            text: 'Teacher Added Successfully',
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

$(document).on('click', "#edit-teacher", function(e){

    var id = $(this).parents('tr').find('td[id]').attr("id");
    var teacher = $(this).parents('tr').find('td[teacher]').attr("teacher");
    var position = $(this).parents('tr').find('td[position]').attr("position");
    var email = $(this).parents('tr').find('td[email]').attr("email");
    var picture = $(this).parents('tr').find('td[picture]').attr("picture");

    $("#edit-id").val(id);
    $("#edit-teacher-name").val(teacher);
    $("#edit-position").val(position);
    $("#edit-email").val(email);
    $("#edit-profile-photo").val('');
    $('#update-profile-photo').attr('src', '/storage/profile/' + picture); 

    $("#editTeacherModal").modal('show');
});

$(document).on('submit', "#update-teacher", function(e){
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
        return await axios.post('/api/update/teacher', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editTeacherModal").modal('hide');
        $('#teachers-data-result').html(response.data.Teachers);
        SweetAlert.fire({
            icon: 'success',
            title: 'Done',
            text: 'Teacher Updated Successfully',
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

$(document).on('click', "#delete-teacher", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the teacher account permanently.",
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
                id: $(this).parents('tr').find('td[id]').attr("id")
            };
            async function APIrequest() {
                return await axios.delete('/api/delete/teacher', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#teachers-data-result').html(response.data.Teachers);
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

function createProfilePhoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#create-profile-photo')
                .attr('src', e.target.result)
                .width(200)
                .height(auto);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function updateProfilePhoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#update-profile-photo')
                .attr('src', e.target.result)
                .width(200)
                .height(auto);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('submit', "#update-school-account", function(e){
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
        return await axios.post('/api/update/school-account', formData, {
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

$(document).on('click', '#first-add-row', function() {
    // Get the last row in the table body
    var lastRow = $('#first-table-body tr:last');

    // Check if the last row exists and if it has empty cells (except the first one)
    var isLastRowEmpty = lastRow.find('td:not(:first-child)').filter(function() {
        return $.trim($(this).text()) === '';
    }).length > 0;

    // If the last row is not empty, append a new row
    if (!isLastRowEmpty) {
        var newRow = `<tr>
                        <td class="text-center" status="0" quarter="1">
                            <a href="javascript:;" id="create-pro-meds" class="text-secondary font-weight-bold text-xs me-2"
                                data-toggle="tooltip" title="Update">
                                <i class="fas fa-pen-alt text-sm"></i>
                            </a>
                        </td>
                        <td colspan="12"></td>
                    </tr>`;
        $('#first-table-body').append(newRow);
    }
});

$(document).on('click', '#first-delete-row', function() {
    var $lastRow = $('#first-table-body tr:last');
    var rowCount = $('#first-table-body tr').length;

    // Check if the last row has any data
    var hasData = false;
    $lastRow.find('td').each(function() {
        if ($(this).text().trim() !== '') {
            hasData = true;
            return false; // Exit the loop
        }
    });

    if (rowCount > 0 && !hasData) {
        $lastRow.remove();
    }
});


$(document).on('click', '#second-add-row', function() {
    // Get the last row in the table body
    var lastRow = $('#second-table-body tr:last');

    // Check if the last row exists and if it has empty cells (except the first one)
    var isLastRowEmpty = lastRow.find('td:not(:first-child)').filter(function() {
        return $.trim($(this).text()) === '';
    }).length > 0;

    // If the last row is not empty, append a new row
    if (!isLastRowEmpty) {
        var newRow = `<tr>
                        <td class="text-center" status="0" quarter="2">
                            <a href="javascript:;" id="create-pro-meds" class="text-secondary font-weight-bold text-xs me-2"
                                data-toggle="tooltip" title="Update">
                                <i class="fas fa-pen-alt text-sm"></i>
                            </a>
                        </td>
                        <td colspan="12"></td>
                    </tr>`;
        $('#second-table-body').append(newRow);
    }
});

$(document).on('click', '#second-delete-row', function() {
    var $lastRow = $('#second-table-body tr:last');
    var rowCount = $('#second-table-body tr').length;

    // Check if the last row has any data
    var hasData = false;
    $lastRow.find('td').each(function() {
        if ($(this).text().trim() !== '') {
            hasData = true;
            return false; // Exit the loop
        }
    });

    if (rowCount > 0 && !hasData) {
        $lastRow.remove();
    }
});

$(document).on('click', '#third-add-row', function() {
    // Get the last row in the table body
    var lastRow = $('#third-table-body tr:last');

    // Check if the last row exists and if it has empty cells (except the first one)
    var isLastRowEmpty = lastRow.find('td:not(:first-child)').filter(function() {
        return $.trim($(this).text()) === '';
    }).length > 0;

    // If the last row is not empty, append a new row
    if (!isLastRowEmpty) {
        var newRow = `<tr>
                        <td class="text-center" status="0" quarter="3">
                            <a href="javascript:;" id="create-pro-meds" class="text-secondary font-weight-bold text-xs me-2"
                                data-toggle="tooltip" title="Update">
                                <i class="fas fa-pen-alt text-sm"></i>
                            </a>
                        </td>
                        <td colspan="12"></td>
                    </tr>`;
        $('#third-table-body').append(newRow);
    }
});


$(document).on('click', '#third-delete-row', function() {
    var $lastRow = $('#third-table-body tr:last');
    var rowCount = $('#third-table-body tr').length;

    // Check if the last row has any data
    var hasData = false;
    $lastRow.find('td').each(function() {
        if ($(this).text().trim() !== '') {
            hasData = true;
            return false; // Exit the loop
        }
    });

    if (rowCount > 0 && !hasData) {
        $lastRow.remove();
    }
});

$(document).on('click', '#fourth-add-row', function() {
    // Get the last row in the table body
    var lastRow = $('#fourth-table-body tr:last');

    // Check if the last row exists and if it has empty cells (except the first one)
    var isLastRowEmpty = lastRow.find('td:not(:first-child)').filter(function() {
        return $.trim($(this).text()) === '';
    }).length > 0;

    // If the last row is not empty, append a new row
    if (!isLastRowEmpty) {
        var newRow = `<tr>
                        <td class="text-center" status="0" quarter="4">
                            <a href="javascript:;" id="create-pro-meds" class="text-secondary font-weight-bold text-xs me-2"
                                data-toggle="tooltip" title="Update">
                                <i class="fas fa-pen-alt text-sm"></i>
                            </a>
                        </td>
                        <td colspan="12"></td>
                    </tr>`;
        $('#fourth-table-body').append(newRow);
    }
});

$(document).on('click', '#fourth-delete-row', function() {
    var $lastRow = $('#fourth-table-body tr:last');
    var rowCount = $('#fourth-table-body tr').length;

    // Check if the last row has any data
    var hasData = false;
    $lastRow.find('td').each(function() {
        if ($(this).text().trim() !== '') {
            hasData = true;
            return false; // Exit the loop
        }
    });

    if (rowCount > 0 && !hasData) {
        $lastRow.remove();
    }
});

$(document).on('click', '#create-pro-meds', function() {
    var status = $(this).parents('tr').find('td[status]').attr("status");
    var quarter = $(this).parents('tr').find('td[quarter]').attr("quarter");
    var yearLevel = $('#year-level').text();

    $('input[name=quarter]').val(quarter);
    $('input[name=status]').val(status);
    $('input[name=yearLevel]').val(yearLevel);

    $('#createProMedsModal').modal('show');
});

$(document).on('submit', "#create-promeds", function(e){
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
        return await axios.post('/api/create/promeds', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#createProMedsModal").modal('hide');
        $('#promeds-result').html(response.data.ProMeds);
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
            text: 'Something went wrong',
            confirmButtonColor: "#3a57e8"
        });
    });
});

$(document).on('click', '#edit-pro-meds', function() {

    var $td = $(this).parents('tr').find('td[status]');

    var {
        status,
        id,
        section,
        mps,
        students,
        out1,
        out2,
        out3,
        very,
        sat,
        fair,
        didnot,
        atrisk,
        average
    } = {
        status: $td.attr("status"),
        id: $td.attr("id"),
        section: $td.attr("section"),
        mps: $td.attr("mps"),
        students: $td.attr("students"),
        out1: $td.attr("out1"),
        out2: $td.attr("out2"),
        out3: $td.attr("out3"),
        very: $td.attr("very"),
        sat: $td.attr("sat"),
        fair: $td.attr("fair"),
        didnot: $td.attr("didnot"),
        atrisk: $td.attr("atrisk"),
        average: $td.attr("average")
    };

    $('#section').val(section);
    $('#status').val(status);
    $('#promedID').val(id);
    $('#mps').val(mps);
    $('#students').val(students);
    $('#out1').val(out1);
    $('#out2').val(out2);
    $('#out3').val(out3);
    $('#very').val(very);
    $('#sat').val(sat);
    $('#fair').val(fair);
    $('#didnot').val(didnot);
    $('#atrisk').val(atrisk);
    $('#average').val(average);

    $('#editProMedsModal').modal('show');
});

$(document).on('submit', "#update-promeds", function(e){
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
        return await axios.post('/api/update/promeds', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
            }
        })
    }
    APIrequest().then(response => {
        $("#editProMedsModal").modal('hide');
        $('#promeds-result').html(response.data.ProMeds);
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
            text: 'Something went wrong',
            confirmButtonColor: "#3a57e8"
        });
    });
});

$(document).on('click', "#delete-pro-meds", function(e){
    SweetAlert.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "This will remove the data permanently.",
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
                id: $('#subjectID').val(),
                type: $('#type').val(),
                type2: $('#type2').val(),
                promedID: $(this).parents('tr').find('td[id]').attr("id")
            };
            async function APIrequest() {
                return await axios.delete('/api/delete/promeds', {
                    data: data,
                    headers: {
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    }
                })
            }
            APIrequest().then(response => {
                $('#promeds-result').html(response.data.ProMeds);
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
