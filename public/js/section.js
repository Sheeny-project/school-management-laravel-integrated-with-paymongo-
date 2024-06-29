$(document).ready(function() {
    section_table();
    getSection();
    setInterval(getSection, 2000);
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
const section_table = (setData) => {
    subject_table = new Tabulator("#section-table", {
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
            { title: "NO", field: "id", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SECTION", field: "name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "ACTION", field: "button", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}

const getSection = () => {
    $.ajax({
        url: "/section/show",
        method: "GET",
        dataType: "json",
        success: function(response) {
            console.log('SECTION: ', response);
            section_table(response)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR, textStatus, errorThrown);
        }
    })
}

$(document).on('click', '#show-details', function(e) {
    var id = $(this).attr('data-id');
    console.log(id);
    $('#section-details').modal('show');

    $.ajax({
        url: '/section/show/all',
        method: 'GET',
        dataType: 'json',
        data: { id: id },
        success: function(response) {
            console.table(response)
            section_dtls(response)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR, textStatus, errorThrown);
        }
    })
})

const section_dtls = (setData) => {
    section_tbl = new Tabulator("#details-tbl", {
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
            { title: "SUBJECT", field: "subject", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "SLOT", field: "slot", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "ROOM", field: "slot", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "TIME IN", field: "time_in", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "TIME OUT", field: "time_out", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "DAY", field: "day", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}
