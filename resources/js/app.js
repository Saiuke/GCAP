//Jquery
import $ from 'jquery';

window.$ = window.jQuery = $;

//BS
require('./bootstrap');

// Swal Modals
import swal from 'sweetalert';

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        if (localStorage.getItem("sb|sidebar-toggle") === "true") {
            document.body.classList.toggle("sb-sidenav-toggled");
        }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });

        // Activate all tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

    }

    $("body").on("click", ".delete-entry", (event) => {
        let clickedButton = event.currentTarget;
        let callURL = clickedButton.getAttribute('data-action-route');
        console.log(callURL);
        let entryId = clickedButton.getAttribute('data-entry-id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: callURL,
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        id: entryId
                    },
                    method: 'DELETE',
                    success: () => {
                        swal("The data has been deleted!", {
                            icon: "success",
                        });
                        $('#row_' + entryId).fadeOut();
                    },
                    error: () => {
                        swal("There was an error deleting the data. Please try again!", {
                            icon: "error",
                        });
                    }
                });
            }
        });
    });
});
