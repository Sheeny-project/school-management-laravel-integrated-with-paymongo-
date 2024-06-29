$(document).ready(function() {
    show_course();
    setInterval(show_course, 5000);
});

function show_course() {
    $.ajax({
        url: 'show/course',
        method: 'GET',
        success: function(response) {
            // console.log(response);
            $('#course').empty();
            $.each(response, function(index, item) {
                // Create table row HTML
                let row = `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td>${item.course_desc}</td>
                        <td>${item.button}</td>
                    </tr>
                `;

                // Append the row to the table
                $('#course').append(row);
            });
        }
    });
}

function course_modal() {
    console.log(1);
    $('#add-course').modal('show');
}

function addSubject(id) {
    console.log(id);
    $('#course-id').val(id);
    $('#add-subject').modal('show');
}
$(document).on('click', '#show-sub', function() {
    var id = $(this).attr('data-id');
    window.location.href = "/show/subject/" + id;
});
