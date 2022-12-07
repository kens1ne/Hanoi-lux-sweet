<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Thêm phòng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Thêm phòng</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="index.php?action=rooms" class="btn btn-danger btn-sm add-btn"><i
                                            class="ri-arrow-left-line align-bottom me-1"></i> Quay lại</a>
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="#" class="form-steps" autocomplete="off">
                                <div class="text-center pt-3 pb-4 mb-1">
                                    <h5>Thêm phòng mới</h5>
                                </div>
                                <div id="custom-progress-bar" class="progress-nav mb-4">
                                    <div class="progress" style="height: 1px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <ul class="nav nav-pills progress-bar-tab custom-nav" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-pill active"
                                                data-progressbar="custom-progress-bar" id="pills-gen-info-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-gen-info" type="button"
                                                role="tab" aria-controls="pills-gen-info"
                                                aria-selected="true">1</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-pill" data-progressbar="custom-progress-bar"
                                                id="pills-info-desc-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-info-desc" type="button" role="tab"
                                                aria-controls="pills-info-desc" aria-selected="false">2</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-pill" data-progressbar="custom-progress-bar"
                                                id="pills-success-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-success" type="button" role="tab"
                                                aria-controls="pills-success" aria-selected="false">3</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel"
                                        aria-labelledby="pills-gen-info-tab">
                                        <div>
                                            <div class="mb-4">
                                                <div>
                                                    <h5 class="mb-1">General Information</h5>
                                                    <p class="text-muted">Fill all Information as below</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tên phòng</label>
                                                        <input type="text" class="form-control" id="room_name"
                                                            placeholder="Levart" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Giá /
                                                            đêm</label>
                                                        <input type="number" class="form-control" id="price" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Số người tối đa</label>
                                                        <input type="number" class="form-control" id="quantity_people"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Trinh Van Bo, Hanoi" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Dịch vụ</label>
                                                        <select class="form-control" id="services" data-choices
                                                            name="choices-multiple-default" multiple>
                                                            <?php foreach($serviceList as $value){?>
                                                            <option value="<?=$value['id'];?>"><?=$value['name'];?>
                                                            </option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Loại phòng</label>
                                                        <select class="form-control" id="category">
                                                            <?php foreach($categoryList as $value){?>
                                                            <option value="<?=$value['id'];?>"><?=$value['name'];?>
                                                            </option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Mô tả</label>
                                                    <textarea id="description"
                                                        class="form-control ckeditor-classic"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button"
                                                class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                data-nexttab="pills-info-desc-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Go
                                                to more info</button>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane fade" id="pills-info-desc" role="tabpanel"
                                        aria-labelledby="pills-info-desc-tab">
                                        <div>
                                            <p class="text-muted">Up ảnh phòng.</p>
                                            <input type="file" class="filepond filepond-input-multiple" multiple
                                                name="filepond" data-allow-reorder="true" data-max-file-size="3MB"
                                                data-max-files="5" id="images">
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button"
                                                class="btn btn-link text-decoration-none btn-label previestab"
                                                data-previous="pills-gen-info-tab"><i
                                                    class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                Back to General</button>
                                            <button type="button"
                                                class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                id="add_room" data-nexttab="pills-success-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane fade" id="pills-success" role="tabpanel"
                                        aria-labelledby="pills-success-tab">
                                        <div>
                                            <div class="text-center">

                                                <div class="mb-4">
                                                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json"
                                                        trigger="loop" colors="primary:#0ab39c,secondary:#405189"
                                                        style="width:120px;height:120px"></lord-icon>
                                                </div>
                                                <h5>Well Done !</h5>
                                                <p class="text-muted">You have Successfully Upload</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>