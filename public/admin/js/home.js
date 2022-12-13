const approval = (id) => {
    $.ajax({
        url: 'index.php?action=approval&id=' + id,
        dataType: 'html',
        success: function (result) {
            $('#approval_detail').html(result);
        },
    });
};
$(document).ready(function () {
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    const pond = FilePond.create(document.querySelector('#images'), {
        allowMultiple: true,
        instantUpload: false,
        allowProcess: false,
    });
    const ckClassicEditor = document.querySelectorAll('.ckeditor-classic');
    ckClassicEditor &&
        ckClassicEditor.forEach(function () {
            ClassicEditor.create(document.querySelector('.ckeditor-classic'))
                .then(function (e) {
                    e.ui.view.editable.element.style.height = '200px';
                    editor = e;
                })
                .catch(function (e) {
                    console.error(e);
                });
        });
    document.querySelectorAll('.form-steps') &&
        document.querySelectorAll('.form-steps').forEach(function (l) {
            l.querySelectorAll('.nexttab') &&
                l.querySelectorAll('.nexttab').forEach(function (t) {
                    l.querySelectorAll('button[data-bs-toggle="pill"]').forEach(function (e) {
                        e.addEventListener('show.bs.tab', function (e) {
                            e.target.classList.add('done');
                        });
                    }),
                        t.addEventListener('click', function () {
                            var e = t.getAttribute('data-nexttab');
                            if (e == 'pills-success-tab') {
                                const formData = new FormData();
                                const totalfiles = pond.getFiles();
                                for (let index = 0; index < totalfiles.length; index++) {
                                    formData.append('images[]', totalfiles[index].file, 'Kensine_' + index + '.jpg');
                                }
                                formData.append('room_name', $('#room_name').val());
                                formData.append('price', $('#price').val());
                                formData.append('quantity_people', $('#quantity_people').val());
                                formData.append('address', $('#address').val());
                                formData.append('category', $('#category').val());
                                formData.append('description', editor.getData());
                                const services = $('#services').val();
                                for (let index = 0; index < services.length; index++) {
                                    formData.append('service[]', services[index]);
                                }
                                formData.append('add_room', '');

                                $.ajax({
                                    url: 'index.php?action=add_room',
                                    method: 'POST',
                                    data: formData,
                                    dataType: 'json',
                                    processData: false,
                                    contentType: false,
                                    beforeSend: function () {
                                        $('#add_room').attr('disabled', 'disabled');
                                        $('#add_room')['html'](
                                            `<i class="spinner-border spinner-border-sm"></i> Loading...`,
                                        );
                                    },
                                    success: function (result) {
                                        $('#error_add').attr('disabled', false);
                                        if (result.status == true) {
                                            document.getElementById(e).click();
                                            setTimeout(() => {
                                                window.location.href = 'index.php?action=rooms';
                                            }, 5000);
                                        } else {
                                            $('#error_add').html(`
                                                <div class="alert alert-danger alert-dismissible fade show mb-xl-0" role="alert">
                                                    ${result.msg}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>`);
                                            $('#add_room')['html'](`Submit`);
                                        }
                                    },
                                });
                            } else {
                                document.getElementById(e).click();
                            }
                        });
                }),
                l.querySelectorAll('.previestab') &&
                    l.querySelectorAll('.previestab').forEach(function (r) {
                        r.addEventListener('click', function () {
                            for (
                                var e = r.getAttribute('data-previous'),
                                    t = r.closest('form').querySelectorAll('.custom-nav .done').length,
                                    o = t - 1;
                                o < t;
                                o++
                            )
                                r.closest('form').querySelectorAll('.custom-nav .done')[o] &&
                                    r.closest('form').querySelectorAll('.custom-nav .done')[o].classList.remove('done');
                            document.getElementById(e).click();
                        });
                    });
            var n = l.querySelectorAll('button[data-bs-toggle="pill"]');
            n &&
                n.forEach(function (o, r) {
                    o.setAttribute('data-position', r),
                        o.addEventListener('click', function () {
                            var e;
                            o.getAttribute('data-progressbar') &&
                                ((e = document.getElementById('custom-progress-bar').querySelectorAll('li').length - 1),
                                (e = (r / e) * 100),
                                (document
                                    .getElementById('custom-progress-bar')
                                    .querySelector('.progress-bar').style.width = e + '%')),
                                0 < l.querySelectorAll('.custom-nav .done').length &&
                                    l.querySelectorAll('.custom-nav .done').forEach(function (e) {
                                        e.classList.remove('done');
                                    });
                            for (var t = 0; t <= r; t++)
                                n[t].classList.contains('active')
                                    ? n[t].classList.remove('done')
                                    : n[t].classList.add('done');
                        });
                });
        });
    $(document).on('click', 'button.delete-room', function () {
        const id_room = $(this).data('id');
        const name_room = $(this).data('room-name');
        Swal.fire({
            title: 'Bạn có chắc?',
            text: 'Xóa phòng ' + name_room,
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            confirmButtonText: 'Đúng, xóa phòng!',
            cancelButtonText: 'Hủy',
            buttonsStyling: !1,
            showCloseButton: !0,
        }).then(function (t) {
            t.value &&
                $.ajax({
                    url: 'index.php?action=delete_room',
                    method: 'POST',
                    data: {
                        id_room: id_room,
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.status == true) {
                            Swal.fire({
                                title: 'Xóa thành công!',
                                text: 'Xóa thành công phòng: ' + name_room,
                                icon: 'success',
                                confirmButtonClass: 'btn btn-success w-xs mt-2',
                                buttonsStyling: !1,
                            }).then(function () {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Oops!',
                                text: 'Xóa phòng thất bại',
                                icon: 'error',
                                confirmButtonClass: 'btn btn-danger w-xs mt-2',
                                buttonsStyling: !1,
                            });
                        }
                    },
                });
        });
    });
    $('.edit-room').click(function () {
        $('.filepond').data('room', $(this).data('id'));

        $.ajax({
            url: 'index.php?action=room_info&id=' + $(this).data('id'),
            method: 'GET',
            dataType: 'json',
            success: function (result) {
                $('#room_name_edit').html(result.name);
                $('#room_id').val(result.id);
                $('#room_name').val(result.name);
                $('#room_address').val(result.address);
                $('#room_price').val(result.price);
                $('#room_people').val(result.quantity_people);
                editor.setData(result.description);
                const images = result.image.split(',');
                images.forEach(function (image) {
                    pond.addFile(image);
                });
            },
        });
        $('.modal').on('hide.bs.modal', function () {
            pond.removeFiles({ revert: true });
        });
    });
    $('#edit').click(function () {
        const formData = new FormData();
        const totalfiles = pond.getFiles();
        for (let index = 0; index < totalfiles.length; index++) {
            formData.append('images[]', totalfiles[index].file, 'Kensine_' + index + '.jpg');
        }
        formData.append('room_id', $('#room_id').val());
        formData.append('room_name', $('#room_name').val());
        formData.append('price', $('#room_price').val());
        formData.append('quantity_people', $('#room_people').val());
        formData.append('address', $('#room_address').val());
        formData.append('category', $('#room_category').val());
        formData.append('description', editor.getData());
        formData.append('status', $('#room_status').val());
        formData.append('update_room', '');

        $.ajax({
            url: 'index.php?action=room_update',
            method: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#edit').attr('disabled', 'disabled');
                $('#edit')['html'](`<i class="spinner-border spinner-border-sm"></i> Loading...`);
            },
            success: function (result) {
                $('#message').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ${result.msg}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`);
                setTimeout(() => {
                    window.location.href = 'index.php?action=rooms';
                }, 3000);
            },
        });
    });
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
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
        });
    });
    $(document).on('click', 'button.add-category', function () {
        $.ajax({
            url: 'index.php?action=categories',
            method: 'POST',
            data: {
                category_name: $('#category_name').val(),
                description: $('#category_description').val(),
                add_category: '',
            },
            dataType: 'json',
            beforeSend: function () {
                $('.add-category').attr('disabled', 'disabled');
                $('.add-category')['html'](`<i class="spinner-border spinner-border-sm"></i> Loading...`);
            },
            success: function (result) {
                $('.add-category').attr('disabled', false);
                $('#message').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${result.msg}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
                $('.add-category')['html'](`Thêm`);
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
        });
    });
    $(document).on('click', 'button.delete-category', function () {
        const id_category = $(this).data('id');
        const name = $(this).data('name');
        Swal.fire({
            title: 'Bạn có chắc?',
            text: 'Xóa danh mục ' + name,
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            confirmButtonText: 'Đúng, xóa danh mục!',
            cancelButtonText: 'Hủy',
            buttonsStyling: !1,
            showCloseButton: !0,
        }).then(function (t) {
            t.value &&
                $.ajax({
                    url: 'index.php?action=categories',
                    method: 'POST',
                    data: {
                        id: id_category,
                        delete_category: '',
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.status == true) {
                            Swal.fire({
                                title: 'Xóa thành công!',
                                text: 'Xóa thành công danh mục: ' + name,
                                icon: 'success',
                                confirmButtonClass: 'btn btn-success w-xs mt-2',
                                buttonsStyling: !1,
                            }).then(function () {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Oops!',
                                text: 'Xóa phòng thất bại',
                                icon: 'error',
                                confirmButtonClass: 'btn btn-danger w-xs mt-2',
                                buttonsStyling: !1,
                            });
                        }
                    },
                });
        });
    });
    $(document).on('click', 'button.edit-category', function () {
        $('#category_name_edit').val($(this).data('name'));
        $('#category_id').val($(this).data('id'));
        $('#category_description_edit').val($(this).data('description'));
    });
    $(document).on('click', 'button.category-comfirm-edit', function () {
        $.ajax({
            url: 'index.php?action=categories',
            method: 'POST',
            data: {
                id: $('#category_id').val(),
                category_name: $('#category_name_edit').val(),
                description: $('#category_description_edit').val(),
                edit_category: '',
            },
            dataType: 'json',
            beforeSend: function () {
                $('.category-comfirm-edit').attr('disabled', 'disabled');
                $('.category-comfirm-edit')['html'](`<i class="spinner-border spinner-border-sm"></i> Loading...`);
            },
            success: function (result) {
                $('.category-comfirm-edit').attr('disabled', false);
                $('#message_updated').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${result.msg}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
                $('.category-comfirm-edit')['html'](`Sửa`);
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
        });
    });
    $(document).on('click', 'button.add-service', function () {
        $.ajax({
            url: 'index.php?action=services',
            method: 'POST',
            data: {
                service_name: $('#service_name').val(),
                description: $('#service_description').val(),
                price: $('#service_price').val(),
                add_service: '',
            },
            dataType: 'json',
            beforeSend: function () {
                $('.add-service').attr('disabled', 'disabled');
                $('.add-service')['html'](`<i class="spinner-border spinner-border-sm"></i> Loading...`);
            },
            success: function (result) {
                $('.add-service').attr('disabled', false);
                $('#message').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${result.msg}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
                $('.add-service')['html'](`Thêm`);
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
        });
    });
    $(document).on('click', 'button.delete-service', function () {
        const id_service = $(this).data('id');
        const name = $(this).data('name');
        Swal.fire({
            title: 'Bạn có chắc?',
            text: 'Xóa dịch vụ ' + name,
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            confirmButtonText: 'Đúng, xóa dịch vụ!',
            cancelButtonText: 'Hủy',
            buttonsStyling: !1,
            showCloseButton: !0,
        }).then(function (t) {
            t.value &&
                $.ajax({
                    url: 'index.php?action=services',
                    method: 'POST',
                    data: {
                        id: id_service,
                        delete_service: '',
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.status == true) {
                            Swal.fire({
                                title: 'Xóa thành công!',
                                text: 'Xóa thành công danh mục: ' + name,
                                icon: 'success',
                                confirmButtonClass: 'btn btn-success w-xs mt-2',
                                buttonsStyling: !1,
                            }).then(function () {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Oops!',
                                text: 'Xóa phòng thất bại',
                                icon: 'error',
                                confirmButtonClass: 'btn btn-danger w-xs mt-2',
                                buttonsStyling: !1,
                            });
                        }
                    },
                });
        });
    });
    $(document).on('click', 'button.edit-service', function () {
        $('#service_name_edit').val($(this).data('name'));
        $('#service_id').val($(this).data('id'));
        $('#service_description_edit').val($(this).data('description'));
        $('#service_price_edit').val($(this).data('price'));
    });
    $(document).on('click', 'button.service-comfirm-edit', function () {
        $.ajax({
            url: 'index.php?action=services',
            method: 'POST',
            data: {
                id: $('#service_id').val(),
                service_name: $('#service_name_edit').val(),
                description: $('#service_description_edit').val(),
                price: $('#service_price_edit').val(),
                edit_service: '',
            },
            dataType: 'json',
            beforeSend: function () {
                $('.service-comfirm-edit').attr('disabled', 'disabled');
                $('.service-comfirm-edit')['html'](`<i class="spinner-border spinner-border-sm"></i> Loading...`);
            },
            success: function (result) {
                $('.service-comfirm-edit').attr('disabled', false);
                $('#message_updated').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${result.msg}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
                $('.service-comfirm-edit')['html'](`Sửa`);
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
        });
    });
    $(document).on('click', 'button.ban-user', function () {
        const id_user = $(this).data('id');
        const name = $(this).data('name');
        Swal.fire({
            title: 'Bạn có chắc?',
            text: 'Xóa người dùng ' + name,
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            confirmButtonText: 'Đúng, xóa người dùng!',
            cancelButtonText: 'Hủy',
            buttonsStyling: !1,
            showCloseButton: !0,
        }).then(function (t) {
            t.value &&
                $.ajax({
                    url: 'index.php?action=update_user',
                    method: 'POST',
                    data: {
                        id: id_user,
                        status: 0,
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.status == true) {
                            Swal.fire({
                                title: 'Khóa thành công!',
                                text: 'Khóa thành công người dùng: ' + name,
                                icon: 'success',
                                confirmButtonClass: 'btn btn-success w-xs mt-2',
                                buttonsStyling: !1,
                            }).then(function () {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Oops!',
                                text: 'Khóa thất bại',
                                icon: 'error',
                                confirmButtonClass: 'btn btn-danger w-xs mt-2',
                                buttonsStyling: !1,
                            });
                        }
                    },
                });
        });
    });
    $(document).on('click', 'button.restore-user', function () {
        const id_user = $(this).data('id');
        const name = $(this).data('name');
        Swal.fire({
            title: 'Bạn có chắc?',
            text: 'Khôi phục người dùng ' + name,
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            confirmButtonText: 'Đúng, khôi phục người dùng!',
            cancelButtonText: 'Hủy',
            buttonsStyling: !1,
            showCloseButton: !0,
        }).then(function (t) {
            t.value &&
                $.ajax({
                    url: 'index.php?action=update_user',
                    method: 'POST',
                    data: {
                        id: id_user,
                        status: 1,
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.status == true) {
                            Swal.fire({
                                title: 'Khôi phục thành công!',
                                text: 'Khôi phục thành công người dùng: ' + name,
                                icon: 'success',
                                confirmButtonClass: 'btn btn-success w-xs mt-2',
                                buttonsStyling: !1,
                            }).then(function () {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Oops!',
                                text: 'Khóa thất bại',
                                icon: 'error',
                                confirmButtonClass: 'btn btn-danger w-xs mt-2',
                                buttonsStyling: !1,
                            });
                        }
                    },
                });
        });
    });
});
