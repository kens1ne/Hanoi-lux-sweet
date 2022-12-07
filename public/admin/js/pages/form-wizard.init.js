$(document).ready(function () {
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    const pond = FilePond.create(document.querySelector('#images'), {
        allowMultiple: true,
        instantUpload: false,
        allowProcess: false,
    });
    document.querySelector('#profile-img-file-input') &&
        document.querySelector('#profile-img-file-input').addEventListener('change', function () {
            var e = document.querySelector('.user-profile-image'),
                t = document.querySelector('.profile-img-file-input').files[0],
                o = new FileReader();
            o.addEventListener(
                'load',
                function () {
                    e.src = o.result;
                },
                !1,
            ),
                t && o.readAsDataURL(t);
        }),
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
                                        formData.append(
                                            'images[]',
                                            totalfiles[index].file,
                                            'Kensine_' + index + '.jpg',
                                        );
                                    }
                                    formData.append('room_name', $('#room_name').val());
                                    formData.append('price', $('#price').val());
                                    formData.append('quantity_people', $('#quantity_people').val());
                                    formData.append('address', $('#address').val());
                                    formData.append('category', $('#category').val());
                                    formData.append('description', $('#description').val());
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
                                        r
                                            .closest('form')
                                            .querySelectorAll('.custom-nav .done')
                                            [o].classList.remove('done');
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
                                    ((e =
                                        document.getElementById('custom-progress-bar').querySelectorAll('li').length -
                                        1),
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
});
