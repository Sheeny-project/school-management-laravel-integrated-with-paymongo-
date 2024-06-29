let data_arr = [];

$(document).ready(function() {
    getEvent();
    getSubjects();
    getAvailableSubjects();
    enrolled_table();
    getEventAdded();

});

const enrolled_table = () => {
    enrollTable = new Tabulator("#enrolled-subject", {
        dataTree: true,
        dataTreeSelectPropagate: true,
        layout: "fitColumns",
        maxHeight: "1000px",
        scrollToColumnPosition: "center",
        pagination: "local",
        paginationSize: 10,
        paginationSizeSelector: [10, 50, 100],
        selectable: 1,
        placeholder: "No data available",
        rowFormatter: function(dom) {
            var selectedRow = dom.getData();
            if (true) {
                dom.getElement().classList.add();
            } else if (selectedRow.safety_stock == selectedRow.qty) {
                dom.getElement().classList.add("table-warning");
            }
        },
        columns: [
            { title: "ID", field: "id", hozAlign: "center", width: 75, vertAlign: "middle"},
            { title: "CODE", field: "subject_code", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            { title: "SUBJECT", field: "name", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            { title: "DESCRIPTION", field: "subject_description", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            { title: "YEAR", field: "year", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            { title: "SEMESTER", field: "semester", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            { title: "UNITS", field: "units", hozAlign: "center", formatter: "html", vertAlign: "middle", bottomCalc:"sum",
              bottomCalcFormatter:function(cell){
                  return "Total Units: " + cell.getValue();
              }},
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}

const enrollment_table = (setData) => {
    new Tabulator("#enrollment-table", {
        data: setData,
        dataTree: true,
        dataTreeSelectPropagate: true,
        layout: "fitColumns",
        maxHeight: "1000px",
        scrollToColumnPosition: "center",
        pagination: "local",
        paginationSize: 10,
        paginationSizeSelector: [10, 50, 100],
        selectable: 1,
        placeholder: "No data available",
        rowFormatter: function(dom) {
            var selectedRow = dom.getData();
            if (true) {
                dom.getElement().classList.add();
            } else if (selectedRow.safety_stock == selectedRow.qty) {
                dom.getElement().classList.add("table-warning");
            }
        },
        columns: [
            { title: "ID", field: "id", hozAlign: "center", width: 75, vertAlign: "middle", headerFilter: true },
            { title: "CODE", field: "subject_code", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "SUBJECT", field: "name", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "DESCRIPTION", field: "subject_description", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "YEAR", field: "year", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "SEMESTER", field: "semester", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "UNITS", field: "units", hozAlign: "center", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "ACTION", field: "button", hozAlign: "center", formatter: "html", vertAlign: "middle", headerFilter: true  },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}

$(document).on('click', '.add-btn', function (){
    $(this).prop('disabled', true);
    $(this).html("Added");
    var id = $(this).attr('data-id');

    $.ajax({
        url: '/get/student/data/'+ id,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("stud", response);
            // enrollTable.setData(response);

            var newItem = {
                id: response[0].id,
                name: response[0].name,
                subject_code: response[0].subject_code,
                subject_description: response[0].subject_description,
                year: response[0].year,
                semester: response[0].semester,
                units: response[0].units,
            }

            data_arr.push(newItem);
            enrollTable.setData(data_arr);


        },
        error: function(xhr, status){
            console.log(xhr.responseText);
        }
    })



});


const getEvent = () => {
    $.ajax({
        url: 'student/events',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("events: ", response);
            $.each(response, function (index, item) {
                // Create table row HTML
                let row = `
                    <a class="info-box mb-3 bg-success" style="cursor: pointer" onclick="event_modal(${item.id}, '${item.name}', '${item.description}', ${item.price}, '${item.event_date}')">
                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">${item.name}</span>
                            <span class="info-box-number">${item.price}</span>
                        </div>
                    </a>
                `;

                // Append the row to the table
                $('.event-container').append(row);
            });
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}

const getEventAdded = () => {
    $.ajax({
        url: 'student/events',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("events: ", response);
            $.each(response, function (index, item) {
                let row = `
                        <a href="javascript:void(0)" class="product-title">${item.name}
                        <span class="badge badge-success float-right">${item.status}</span>
                    </a>
                    <span class="product-description">
                        <strong>${item.added_by}</strong> added ${item.name}
                    </span>
                `;
                $('.product-info').append(row);
            });
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}
function event_modal(id, name, desc, price, date){
    console.log(id);
    $('#event-id').val(id);
    $('#event-name').val(name);
    $('#event-desc').val(desc);
    $('#event-price').val(Number(price));
    $('#event-date').val(date);
    $('#avail-event').modal('show');
 }

 const getSubjects = () => {
    $.ajax({
        url: 'student/available/subject',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Subject: ' , response);
            $.each(response, function (index, item) {
                let row = `
                <tr>
                <td>${item.subject_code}</td>
                <td>${item.name}</td>
                <td>${item.units}</td>
                </tr>
                `;

                $('#subject-cont').append(row);
            });
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}

function enrollSubject(){
    $('#enroll-subject').modal('show');
}
const getAvailableSubjects = () => {
    $.ajax({
        url: 'student/enroll/subject',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('available: ' , response);
            enrollment_table(response);
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}

$('.add-subject').on('click', function() {
    // console.log(data_arr);
    $.ajax({
        headers:{
            'X-CSRF-TOKEN': $ ('meta[name="csrf-token"]').attr('content')
        },
        url: 'student/enroll/all/subject',
        method: 'POST',
        dataType: 'json',
        data: {data_arr: data_arr},
        success: function(response){
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Added successfully',
            });
            $('#enroll-subject').modal('close');
            data_arr = [];

        },
        error: function(xhr, status, error) {
            var response = JSON.parse(xhr.responseText);
            console.log(xhr);
            console.log(status, response);
        }

    })
});




