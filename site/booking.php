<style>
input[type="radio"] {
    display: none;
}

input[type="radio"]+label:before {
    content: "";
    display: inline-block;
    width: 25px;
    height: 25px;
    padding: 6px;
    margin-right: 3px;
    background-clip: content-box;
    border: 2px solid #bbb;
    background-color: #e7e6e7;
    border-radius: 50%;
}

input[type="radio"]:checked+label:before {
    background-color: #93e026;
}

label {
    display: flex;
    align-items: center;
}
</style>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="bg-light p-4 my-5">
                    <div class="sub-title">
                        <span>Invoice</span>
                        <h1>Xác nhận đặt phòng: <b><?=$info['name'];?></b></h1>
                    </div>
                    <form action="index.php?action=comfirm" method="POST">
                        <input type="hidden" name="room_id" value="<?=$info['id'];?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nhận phòng</label>
                                    <input type="disabled" class="form-control" value="<?=$_GET['start_date'];?>"
                                        name="start_date" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Trả phòng</label>
                                    <input type="disabled" class="form-control" value="<?=$_GET['end_date'];?>"
                                        name="end_date" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Địa điểm</label>
                                    <input type="disabled" class="form-control" value="<?=$info['address'];?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Người đặt</label>
                                    <input type="disabled" class="form-control" value="<?=$_SESSION['user']['name'];?>"
                                        name="name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Số điện thoại người đặt</label>
                                    <input type="text" class="form-control" value="<?=$_SESSION['user']['phone'];?>"
                                        name="phone">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <h3>Tổng thanh toán</h3>
                                    <div class="sub-title">
                                        <h2 style="color:red">
                                            <b><?=number_format($info['price'] * $day_booking + $info['service_price']);?>
                                                VNĐ</b>
                                            (<?=$day_booking;?>
                                            Ngày)
                                        </h2>
                                        <input type="hidden" name="total"
                                            value="<?=$info['price'] * $day_booking + $info['service_price'];?>">
                                    </div>
                                    <small>Tổng thanh toán đã bao gồm phí dịch vụ</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <h3>Hình thức thanh toán</h3>
                                <div class="d-flex justify-content-center">
                                    <div class="mx-4">
                                        <input type="radio" name="bank" value="tructiep" id="radio1" checked="true" />
                                        <label class="radio" for="radio1">Thanh toán trực tiếp</label>
                                    </div class="mx-4">
                                    <div>
                                        <input type="radio" name="bank" value="banking" id="radio3" />
                                        <label for="radio3">Thanh toán chuyển khoản</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger" name="comfirm_booking">Xác nhận</button>
                    </form>
                </div>

            </div>
            <div class="col-4 my-5">
                <div class="owl-carousel owl-theme">
                    <?php
                            foreach($room_image as $key => $element) {
                                echo '<div class="">';
                                if ($key === array_key_first($room_image)){
                                    echo '<a href=""><img src="'.$element['image'].'" alt=""></a>';
                                }else{
                                    echo '<a href=""><img src="'.$element['image'].'" alt=""></a>';
                                }
                                echo '</div>';
                            }
                            ?>
                </div>
            </div>
        </div>


    </div>
</div>