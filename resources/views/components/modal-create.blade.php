<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-name" id="exampleModalLabel">ADD</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Category Name</label>
                    <input type="text" class="form-control" id="category-name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close-btn" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-category', function () {
        //open modal
        $('#modal-create').modal('show');
    });
    //action create post
    $('#store').click(function(e) {
        e.preventDefault();
        //define variable
        let categoryName   = $('#category-name').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        //ajax
        $.ajax({
            url: `/cms/categories`,
            type: "POST",
            cache: false,
            data: {
                "name": categoryName,
                "_token": token
            },
            success:function(response){
                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                //data category
                let categoryRow = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.id}</td>
                        <td>${response.data.name}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-category" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-category" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                //append to table
                $('#table-categories').prepend(categoryRow);
                $('#category-name').val('');
                $('#alert-name').removeClass('d-block').addClass('d-none').html('');
                $('#modal-create').modal('hide');
            },
            error:function(error){
                if(error.status === 422) {
                    let errors = error.responseJSON.errors;

                    if (errors.name) {
                        $('#alert-name')
                            .removeClass('d-none')
                            .addClass('d-block')
                            .html(errors.name[0]);
                    }
                }
            }

        });
    });

    //update medthod
</script>