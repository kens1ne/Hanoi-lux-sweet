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
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                            id="create-btn" data-bs-target="#addModal"><i
                                                class="ri-add-line align-bottom me-1"></i> Thêm danh mục</button>
                                    </div>
                                </div>
                            </div>
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($categoryList as $value){?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><span class="badge bg-danger"><?=$value['name'];?></span></td>
                                        <td><?=$value['description'];?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-danger btn-sm delete-category"
                                                    data-id="<?=$value['id'];?>"
                                                    data-name="<?=$value['name'];?>">Xóa</button>
                                                <button class="btn btn-success btn-sm edit-category"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    data-id="<?=$value['id'];?>" data-name="<?=$value['name'];?>"
                                                    data-description="<?=$value['description'];?>">Chỉnh sửa</button>
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
<!-- Add category-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục phòng</h5>
                <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="mb-3">
                        <label for="api-key-name" class="form-label">Tên danh mục <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="category_name" placeholder="Single bed room (SGL)">
                    </div>
                    <div class="mb-3">
                        <label for="api-key-name" class="form-label">Mô tả <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="category_description" rows="10"></textarea>
                    </div>
                </form>
                <div id="message"></div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success add-category">Thêm</button>
                </div>
            </div>
        </div>
        <!-- modal content -->
    </div>
</div>
<!-- end modal -->
<!-- Edit category-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục: <span id="name_category_edit"></span>
                </h5>
                <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="mb-3">
                        <label for="api-key-name" class="form-label">Tên danh mục <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="category_name_edit"
                            placeholder="Single bed room (SGL)">
                        <input type="hidden" class="form-control" id="category_id">
                    </div>
                    <div class="mb-3">
                        <label for="api-key-name" class="form-label">Mô tả <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="category_description_edit" rows="10"></textarea>
                    </div>
                </form>
                <div id="message_updated"></div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success category-comfirm-edit">Sửa</button>
                </div>
            </div>
        </div>
        <!-- modal content -->
    </div>
</div>
<!-- end modal -->