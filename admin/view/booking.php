<div class="vertical-overlay"></div>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Quản lý đặt phòng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý đặt phòng</li>
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
                            <h5 class="card-title mb-0">Danh sách đơn đặt phòng</h5>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên người đặt phòng</th>
                                        <th>Phone</th>
                                        <th>Nhận phòng</th>
                                        <th>Trả phòng</th>
                                        <th>Phòng</th>
                                        <th>Người đặt</th>
                                        <th>Tổng thanh toán</th>
                                        <th>Loại phòng</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bookingList as $value){?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['name_booking'];?></td>
                                        <td><?=$value['phone'];?></td>
                                        <td><span class="badge bg-danger"><?=$value['start_date'];?></span></td>
                                        <td><span class="badge bg-success"><?=$value['end_date'];?></span></td>
                                        <td><?=$value['room_name'];?></td>
                                        <td><?=$value['username'];?></td>
                                        <td><span
                                                class="badge badge-soft-danger"><?=number_format($value['total_price']);?>
                                                đ</span>
                                        </td>
                                        <td><span class="badge bg-info"><?=$value['category'];?></span></td>
                                        <td>
                                            <?php if($value['status'] == 0){?>
                                            <span class="badge bg-info">Chờ duyệt</span>
                                            <?php }elseif($value['status'] == 1){?>
                                            <span class="badge bg-success">Đã duyệt</span>
                                            <?php }else{?>
                                            <span class="badge bg-danger">Đã hủy</span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="index.php?action=booking_detail&id=<?=$value['id'];?>"
                                                    class="btn btn-success btn-sm">Xem chi
                                                    tiết</a>
                                                <button onclick="approval(<?=$value['id'];?>)"
                                                    class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target=".bs-example-modal-lg">Duyệt</button>
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