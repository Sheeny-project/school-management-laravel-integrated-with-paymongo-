$(document).ready(function() {
    getAllNotifications();
});

const getAllNotifications = () => {
    $.ajax({
        url: 'get/notif',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log("notif", response);
            $.each(response, function (index, item) {
                let row = `
                <a href="#" class="dropdown-item">
                   <div class="media">
                      <div class="media-body">
                         <h3 class="dropdown-item-title">
                            ${item.name}
                            <span class="float-right text-sm text-success"><i class="fas fa-star"></i></span>
                         </h3>
                         <p class="text-sm">Call me whenever you can...</p>
                         <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>${item.created_at}</p>
                      </div>
                   </div>
                </a>
                `;

                $('#notif').append(row);
            });
        },
        error: function(xhr, status, error) {
            console.error("Error fetching!" + error.message );
        }
    });

}
