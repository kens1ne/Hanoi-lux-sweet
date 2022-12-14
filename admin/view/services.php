<div class="vertical-overlay"></div>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Quản lý dịch vụ</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý dịch vụ</li>
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
                            <h5 class="card-title mb-0">Danh sách dịch vụ</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                            id="create-btn" data-bs-target="#addModal"><i
                                                class="ri-add-line align-bottom me-1"></i> Thêm dịch vụ</button>
                                    </div>
                                </div>
                            </div>
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Mô tả</th>
                                        <th>Giá</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($serviceList as $value){?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><span class="badge bg-danger"><?=$value['name'];?></span></td>
                                        <td><?=$value['description'];?></td>
                                        <td><?=number_format($value['price']);?> VNĐ</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-danger btn-sm delete-service"
                                                    data-id="<?=$value['id'];?>"
                                                    data-name="<?=$value['name'];?>">Xóa</button>
                                                <button class="btn btn-success btn-sm edit-service"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    data-id="<?=$value['id'];?>" data-name="<?=$value['name'];?>"
                                                    data-description="<?=$value['description'];?>"
                                                    data-price="<?=$value['price'];?>">Chỉnh sửa</button>
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
<!-- Add service-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm dịch vụ</h5>
                <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="mb-3">
                        <label for="api-key-name" class="form-label">Tên dịch vụ <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="service_name" placeholder="Tập Gym">
                    </div>
                    <div class="mb-3">
                        <label for="api-key-name" class="form-label">Mô tả <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="service_description" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="api-key-name" class="form-label">Giá tiền <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="service_price">
                    </div>
                </form>
                <div id="message"></div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success add-service">Thêm</button>
                </div>
            </div>
        </div>
        <!-- modal content -->
    </div>
</div>
<!-- end modal -->
<!-- Edit service-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục: <span id="name_service_edit"></span>
                </h5>
                <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="mb-3">
                        <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="service_name_edit"
                            placeholder="Single bed room (SGL)">
                        <input type="hidden" class="form-control" id="service_id">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="service_description_edit" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá tiền <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="service_price_edit">
                    </div>
                </form>
                <div id="message_updated"></div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success service-comfirm-edit">Sửa</button>
                </div>
            </div>
        </div>
        <!-- modal content -->
    </div>
</div>
<!-- end modal -->