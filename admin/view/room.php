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
                                            id="create-btn" data-bs-target="#showModal"><i
                                                class="ri-add-line align-bottom me-1"></i> Add</button>
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
                                            <?php }else{?>
                                            <span class="badge bg-danger">LOCK</span>
                                            <?php }?>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                                                <button onclick="editCategory(<?=$value['id'];?>)"
                                                    class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target=".bs-example-modal-lg">Chỉnh sửa</button>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="approval_detail">
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i
                        class="ri-close-line me-1 align-middle"></i> Close</a>
                <button id="approval_comfirm" class="btn btn-danger">Save changes</button>
            </div>

        </div><!-- /.modal-content -->
    </div>
</div><!-- /.modal -->