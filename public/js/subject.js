$(document).ready(function() {
    user_table();
    section_table();
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
    subject_table = new Tabulator(".subject-table", {
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
        rowFormatter: function(dom) {
            var selectedRow = dom.getData();
            if (true) {
                dom.getElement().classList.add();
            } else if (selectedRow.safety_stock == selectedRow.qty) {
                dom.getElement().classList.add("table-warning");
            }
        },
        columns: [
            { title: "CODE", field: "subject_code", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SUBJECT", field: "subject", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "LECTURE UNIT", field: "lec_unit", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "LABORATORY UNIT", field: "lab_unit", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SEMESTER", field: "semester", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "YEAR", field: "year", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "ACTION", field: "button", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}


const showSubject = (id) => {
    $.ajax({
        url: '/subject/all/' + id,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("getsubject:", response);
            // Call user_table with response data
            user_table(response);
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}

$(document).on('click', '#show-section', function() {
    const id = this.getAttribute('data-id');
    console.log(id);
    $('#section-modal').modal('show');

    $.ajax({
        url: '/course/all',
        type: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function(response) {
            console.table(response);
            section_table(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    })
});

function search(value) {
    section_table.setFilter([
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
        rowFormatter: function(dom) {
            var selectedRow = dom.getData();
            if (true) {
                dom.getElement().classList.add();
            } else if (selectedRow.safety_stock == selectedRow.qty) {
                dom.getElement().classList.add("table-warning");
            }
        },
        columns: [
            { title: "COURSE", field: "course", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SLOT", field: "slot", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "TIME IN", field: "time_in", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "TIME OUT", field: "time_out", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "DAY", field: "day", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}

$(document).on('click', '#add-section', function() {
    const id = this.getAttribute('data-id');
    console.log(id);
    $('#added-section').modal('show');
    $('#subject-id').val(id);
});
