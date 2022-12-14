
<style>
    .main-order {
        background-color: #fdfaf0;
        padding: 150px;
    }
    .detail-order {
        max-width: 600px;
        margin: 0 auto;
        padding: 35px 50px;
        background-color: #fff;
    }
    .detail-order h5 {
        text-align: center;
        padding: 10px 0;
    }
    .inf-order {
        display: flex;
        justify-content: space-between;
    }
</style>
<div class="main-order">
<div class="detail-order">
    <h5 style="font-weight: bold;">Thông tin hóa đơn khách sạn Levart</h5>

    <div class="inf-order">
        <p>Họ tên người đặt: </p>
        <span><?=$order['name_booking']?></span>
    </div>
    <div class="inf-order">
        <p>Điện thoại: </p>
        <span><?=$order['phone']?></span>
    </div>
    <div class="inf-order">
        <p>Địa chỉ: </p>
        <span><?=$order['address']?></span>
    </div>
    <div class="inf-order">
        <p>Ngày nhận phòng: </p>
        <span><?=$order['start_date']?></span>
    </div>
    <div class="inf-order">
        <p>Ngày trả phòng: </p>
        <span><?=$order['end_date']?></span>
    </div>
    
    <h5 style="font-weight: bold;">Thông tin phòng</h5>
    <div class="inf-order">
        <p>Tên phòng: </p>
        <span><?=$order['name']?></span>
    </div>
    <div class="inf-order">
        <p>Giá phòng theo ngày: </p>
        <span><?=$order['price']?> VNĐ</span>
    </div>
    <div class="inf-order">
        <p>Tổng số tiền cần thanh toán: </p>
        <span style="color: red;font-weight: bold;"><?=$order['total_price']?> VNĐ</span>
    </div>

    <div style="height: 25px;" class="inf-order">
        <p>Trạng thái: </p>
        <?php if($order['status'] == 0){?>
        <span class="badge bg-info">Chờ duyệt</span>
        <?php }elseif($order['status'] == 1){?>
        <span class="badge bg-success">Đã duyệt</span>
        <?php }else{?>
        <span class="badge bg-danger">Đã hủy</span>
        <?php } ?>
    </div>


</div>
</div>