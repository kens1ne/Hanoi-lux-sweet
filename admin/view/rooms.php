<div class="vertical-overlay"></div>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Quản lý danh mục</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý danh mục</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Danh sách danh mục</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="index.php?action=add_room" class="btn btn-success add-btn"><i
                                                class="ri-add-line align-bottom me-1"></i> Thêm phòng</a>
                                    </div>
                                </div>
                            </div>
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên phòng</th>
                                        <th>Giá / đêm</th>
                                        <th>Số người</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($roomList as $value){?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['name'];?></td>
                                        <td><span class="badge bg-success"><?=number_format($value['price']);?> đ</span>
                                        </td>
                                        <td><?=$value['quantity_people'];?></td>
                                        <td><?=$value['address'];?></td>
                                        <td>
                                            <?php if($value['status'] == 1){?>
                                            <span class="badge bg-success">ON</span>
                                            <?php }elseif($value['status'] == 2){?>
                                            <span class="badge bg-warning">MAINTAIN</span>
                                            <?php }elseif($value['status'] == 0){?>
                                            <span class="badge bg-danger">LOCK</span>
                                            <?php }else{?>
                                            <span class="badge bg-danger">DELETED</span>
                                            <?php } ?>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-danger btn-sm delete-room"
                                                    data-id="<?=$value['id'];?>"
                                                    data-room-name="<?=$value['name'];?>">Xóa</button>
                                                <button class=" btn btn-success btn-sm edit-room" data-bs-toggle="modal"
                                                    data-bs-target=".bs-example-modal-lg"
                                                    data-id="<?=$value['id'];?>">Chỉnh sửa</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!-- Vertically Centered -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa phòng: <span id="room_name_edit"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- With Controls -->
                <input type="hidden" id="room_id" value="">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <label class="form-label">Tên phòng</label>
                            <input type="text" class="form-control" value="" id="room_name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" value="" id="room_address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label class="form-label">Giá phòng</label>
                            <input type="number" class="form-control" value="" id="room_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label class="form-label">Số lượng người</label>
                            <input type="number" class="form-control" value="" id="room_people">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <label class="form-label">Mô tả</label>
                            <textarea id="room_description" class="form-control ckeditor-classic"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div>
                            <label class="form-label">Loại phòng</label>
                            <select class="form-select" id="room_category">
                                <?php foreach($categoryList as $value){?>
                                <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <label class="form-label">Ảnh phòng</label>
                            <input type="file" class="filepond filepond-input-multiple" multiple name="filepond"
                                data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5" id="images"
                                data-room="">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 my-3">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" id="room_status">
                            <option value="1">ON</option>
                            <option value="2">MAINTAIN</option>
                            <option value="0">LOCK</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div id="message"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i
                        class="ri-close-line me-1 align-middle"></i> Close</a>
                <button id="edit" class="btn btn-danger">Save changes</button>
            </div>

        </div><!-- /.modal-content -->
    </div>
</div><!-- /.modal -->