$(document).ready(function() {
    getStudentTable();
});

const user_table = (setData) => {
    new Tabulator("#user-table", {
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
            { title: "ID", field: "id", hozAlign: "center", width: 75, vertAlign: "middle", headerFilter: true },
            { title: "NAME", field: "name", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "AGE", field: "age", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "EMAIL", field: "email", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "ADDRESS", field: "address", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            { title: "GENDER", field: "gender", hozAlign: "left", formatter: "html", vertAlign: "middle", headerFilter: true  },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}
const getStudentTable = () => {
    $.ajax({
        url: '/enrolled/student',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("enrolled", response);
            // Call user_table with response data
            user_table(response);
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}
