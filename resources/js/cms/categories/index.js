import { CreateCategoryEvents } from "./create";
import { UpdateCategoryEvents } from "./update";

// open modal create
$(document).on("click", "#btn-create-category", function () {
    // Bootstrap 4
    $("#modal-create").modal("show");

    // Bootstrap 5
    // let modalCreate = new bootstrap.Modal(document.getElementById("modal-create"));
    // modalCreate.show();
});

// auto focus input saat modal create dibuka
$("#modal-create").on("shown.bs.modal", function () {
    $("#category-name").trigger("focus");
});

// buka modal edit + isi data dengan ajax
$(document).on("click", ".btn-edit-category", function () {
    let category_id = $(this).data("id");

    $.ajax({
        url: `/cms/categories/${category_id}`, // route show
        type: "GET",
        cache: false,
        success: function (response) {
            // isi form modal
            $("#category_id").val(response.data.id);
            $("#category-name-update").val(response.data.name);

            // buka modal
            $("#modal-edit").modal("show");
        },
    });
});

// init modul create & update
$(document).ready(function () {
    CreateCategoryEvents();
    UpdateCategoryEvents();
});
