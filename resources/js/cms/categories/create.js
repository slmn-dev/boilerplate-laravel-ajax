export function CreateCategoryEvents() {
    //action create post
    $("#store").click(function (e) {
        e.preventDefault();
        //define variable
        let categoryName = $("#category-name").val();
        let token = $("meta[name='csrf-token']").attr("content");
        //ajax
        $.ajax({
            url: `/cms/categories`,
            type: "POST",
            cache: false,
            data: {
                name: categoryName,
                _token: token,
            },
            success: function (response) {
                //show success message
                Swal.fire({
                    type: "success",
                    icon: "success",
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000,
                });
                //data category
                let categoryRow = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.name}</td>
                        <td>${response.data.created_at}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" data-id="${response.data.id}" class="btn btn-primary btn-sm btn-edit-category">EDIT</a>
                            <a href="javascript:void(0)" data-id="${response.data.id}" class="btn btn-danger btn-sm btn-delete-category">DELETE</a>
                        </td>
                    </tr>
                `;

                //append to table
                $("#table-categories").prepend(categoryRow);
                $("#category-name").val("");
                $("#alert-name")
                    .removeClass("d-block")
                    .addClass("d-none")
                    .html("");
                $("#modal-create").modal("hide");
                //reload table
                $("#table-container").load(
                    location.href + " #table-container > *",
                );
            },
            error: function (error) {
                if (error.status === 422) {
                    let errors = error.responseJSON.errors;

                    if (errors.name) {
                        $("#alert-name")
                            .removeClass("d-none")
                            .addClass("d-block")
                            .html(errors.name[0]);
                    }
                }
            },
        });
    });
}
