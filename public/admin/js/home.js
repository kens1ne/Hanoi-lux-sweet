const approval = (id) => {
    $.ajax({
        url: 'index.php?action=approval&id=' + id,
        dataType: 'html',
        success: function (result) {
            $('#approval_detail').html(result);
        },
    });
};
$('#approval_comfirm').click(function () {
    $.ajax({
        url: 'index.php?action=approval_comfirm',
        method: 'POST',
        data: {
            id_detail: $('#id_approval_detail').val(),
            type: $('#type_approval_detail').val(),
        },
        dataType: 'json',
        beforeSend: function () {
            $('#approval_comfirm').attr('disabled', 'disabled');
            $('#approval_comfirm')['html'](`<i class="spinner-border spinner-border-sm"></i> Loading...`);
        },
        success: function (result) {
            $('#approval_comfirm').attr('disabled', false);
            $('#approval_message').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ${result.msg}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`);
            $('#approval_comfirm')['html'](`Save changes`);
        },
    });
});
