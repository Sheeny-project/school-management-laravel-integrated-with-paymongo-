$(document).ready(function() {
    getEnrolled();
})
const enrolled_table = (setData) => {
    new Tabulator("#enrolled-table", {
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
            { title: "CODE", field: "subject_code", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            { title: "SUBJECT", field: "name", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
              { title: "STATUS", field: "status", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
              { title: "ACTION", field: "action", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}


const getEnrolled = () => {
    $.ajax({
        url: '/enrolled/subject/all',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("enrolled: ", response);
            enrolled_table(response);
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}
