$(document).ready(function() {
    getUserTable();
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
                dom.getElement().classList.add("table-light");
            } else if (selectedRow.safety_stock == selectedRow.qty) {
                dom.getElement().classList.add("table-warning");
            }
        },
        columns: [
            { title: "ID", field: "id", hozAlign: "center", width: 75, vertAlign: "middle" },
            { title: "NAME", field: "name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "EMAIL", field: "email", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            { title: "ROLE", field: "role", hozAlign: "left", formatter: "html", vertAlign: "middle" },
            // { title: "ACTION", field: "button_name", hozAlign: "left", formatter: "html", vertAlign: "middle" },
        ]
    });
}

const getUserTable = () => {
    $.ajax({
        url: 'users/show',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("users", response);
            // Call user_table with response data
            user_table(response);
        },
        error: function(xhr, status, error) {
            console.error("Error fetching user data:", error);
        }
    });
}
// const getInventoryTable = () => {
//     $.ajax({
//         url: '/low/stock',
//         method: 'GET',
//         dataType: 'json',
//         success: function (response) {
//             console.log("inventory", response);
//             $.each(response, function (index, item) {
//                 // Create table row HTML
//                 let row = `
//                     <tr>
//                         <td>${item.id}</td>
//                         <td>${item.name}</td>
//                         <td><span class="badge badge-info">${item.quantity}</span></td>
//                         <td>${item.button_name}</td>
//                     </tr>
//                 `;

//                 // Append the row to the table
//                 $('#low-stocks tbody').append(row);
//             });
//         },
//     });
// }
