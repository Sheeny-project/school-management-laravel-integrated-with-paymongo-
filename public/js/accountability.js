$(document).ready(function() {
    getStudentTable();
});
function search(value){
    account_tbl.setFilter([
        [
            {field:"user_id", type:"like", value:value.trim()},
            {field:"accountability", type:"like", value:value.trim()},
            {field:"amount", type:"like", value:value.trim()},
            {field:"status", type:"like", value:value.trim()},
        ]
    ]);
}
const user_table = (setData) => {
    account_tbl = new Tabulator("#user-table", {
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
            { title: "NAME", field: "user_id", hozAlign: "left", formatter: "html", vertAlign: "middle"  },
            { title: "DESCRIPTION", field: "accountability", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "AMOUNT", field: "amount", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "STATUS", field: "status", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}
const getStudentTable = () => {
    $.ajax({
        url: '/finance/accountabilities/unpaid',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("not paid: ", response);
            // Call user_table with response data
            user_table(response);
        },
        error: function(xhr, status, error) {
            console.log(1);
            console.error("Error fetching user data:", error);
        }
    });
}
