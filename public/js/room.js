$(document).ready(function() {
    user_table();
    getRoom();
    setInterval(getRoom, 2000);
});

function search(value) {
    subject_table.setFilter([
        [
            { field: "subject_code", type: "like", value: value.trim() },
            { field: "subject", type: "like", value: value.trim() },
            { field: "lec_unit", type: "like", value: value.trim() },
            { field: "lab_unit", type: "like", value: value.trim() },
            { field: "semester", type: "like", value: value.trim() },
            { field: "year", type: "like", value: value.trim() },
        ]
    ]);
}
const user_table = (setData) => {
    subject_table = new Tabulator("#room-table", {
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
            { title: "ID", field: "id", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "ROOM", field: "room_number", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "TYPE", field: "type", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "ACTION", field: "button", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}

const getRoom = () => {
    $.ajax({
        url: "/room/show",
        method: "GET",
        dataType: "json",
        success: function(response) {
            console.log('ROOMS: ', response);
            user_table(response)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR, textStatus, errorThrown);
        }
    })
}

$(document).on('click', '#show-sections', function(e) {
    var id = $(this).attr('data-id');
    console.log(id);
    $('#section-room').modal('show');
    $(this).prop('disabled', true);
    $.ajax({
        url: '/room/section/all',
        method: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            console.table(response);
            section_table(response)
        },
        error: function(errorThrown, response) {
            console.error(errorThrown, response);
        }
    })
});

const section_table = (setData) => {
    subject_table = new Tabulator("#sections", {
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
            { title: "NO", field: "id", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SECTION", field: "section_id", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SUBJECT", field: "subject_id", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SLOT", field: "slot", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "TIME IN", field: "time_in", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "TIME OUT", field: "time_out", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "DAY", field: "day_id", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}
