export function UpdateCategoryEvents() {
    $(document).on("click", "#update", function (e) {
        e.preventDefault();

        let category_id = $("#category_id").val();
        let categoryName = $("#category-name-update").val();
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: `/cms/categories/${category_id}`,
            type: "PUT",
            data: {
                name: categoryName,
                _token: token,
            },
            success: function (response) {
                console.log("Response success:", response);

                Swal.fire({
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2000,
                });

                $(`#index_${response.data.id} td:nth-child(1)`).text(
                    response.data.name,
                );

                $("#modal-edit").modal("hide");
            },
            error: function (error) {
                console.log("Error:", error);

                if (error.status === 422) {
                    let errors = error.responseJSON.errors;
                    if (errors.name) {
                        $("#alert-title-edit")
                            .removeClass("d-none")
                            .addClass("d-block")
                            .html(errors.name[0]);
                    }
                }
            },
        });
    });
}
