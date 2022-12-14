<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Thông tin chi tiết</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Thông tin chi tiết</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="card" id="demo">
                        <div class="row">
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Chi tiết đơn</p>
                                            <h5 class="fs-14 mb-0">#<?=$info['id'];?></h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Nhận phòng</p>
                                            <h5 class="fs-14 mb-0"><span
                                                    id="invoice-date"><?=$info['start_date'];?></span> </h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Trả phòng</p>
                                            <h5 class="fs-14 mb-0"><span
                                                    id="invoice-date"><?=$info['end_date'];?></span> </h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Tổng thanh toán</p>
                                            <h5 class="fs-14 mb-0"><span
                                                    id="total-amount"><?=number_format($info['total_price']);?>
                                                    VNĐ</span></h5>
                                        </div>

                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4 border-top border-top-dashed">
                                    <div class="row g-3 mb-5">
                                        <div class="col-lg-6 col-12">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Thông tin chi tiêt
                                            </h6>
                                            <p class="text-uppercase">Họ tên người nhận phòng:
                                                <b class="text-danger"><?=$info['name_booking'];?></b>
                                            </p>
                                            <p class="text-uppercase">Phòng:
                                                <b class="text-success"><?=$info['name'];?></b>
                                            </p>
                                            <p class="text-uppercase">Địa chỉ:
                                                <b><?=$info['address'];?></b>
                                            </p>
                                            <p class="text-uppercase">Số điện thoại:
                                                <b><?=$info['phone'];?></b>
                                            </p>
                                            <p class="text-uppercase">Email:
                                                <b><?=$info['email'];?></b>
                                            </p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-12">
                                            <!-- Dark Variant -->
                                            <div id="carouselExampleDark" class="carousel carousel-dark slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselExampleDark"
                                                        data-bs-slide-to="0" class="active" aria-current="true"
                                                        aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselExampleDark"
                                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselExampleDark"
                                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                    <?php foreach($images as $value){?>
                                                    <div class="carousel-item <?= ($images[0] === $value) ? 'active' : ''?>"
                                                        data-bs-interval="10000">
                                                        <img src="<?=$value;?>" class="d-block w-100" alt="...">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5 class="text-white"><?=$info['name'];?></h5>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="card-body p-4 border-top border-top-dashed">
                                        <div class="hstack gap-2 justify-content-end d-print-none mt-2">
                                            <?php if($info['status'] == 0){?>
                                            <button class="btn btn-info"><i
                                                    class="ri-checkbox-blank-fill align-bottom me-1"></i> Đang chờ
                                                duyệt</button>
                                            <?php }elseif($info['status'] == 1){?>
                                            <button class="btn btn-success"><i
                                                    class="ri-checkbox-fill align-bottom me-1"></i> Đã duyệt</button>
                                            <?php }else{?>
                                            <button class="btn btn-danger"><i
                                                    class="ri-archive-fill align-bottom me-1"></i> Đã hủy</button>
                                            <?php } ?>
                                        </div>

                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">

                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div><!-- container-fluid -->
        </div><!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                        document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div><!-- end main content-->