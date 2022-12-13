
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
<?php 
    extract($order);
?>
<div class="main-order">
<div class="detail-order">
    <h5 style="font-weight: bold;">Thông tin hóa đơn khách sạn Levart</h5>
<?php foreach($order as $detail){  ?>
    <div class="inf-order">
        <p>Họ tên người đặt: </p>
        <span><?=$detail['name_booking']?></span>
    </div>
    <div class="inf-order">
        <p>Điện thoại: </p>
        <span><?=$detail['phone']?></span>
    </div>
    <div class="inf-order">
        <p>Địa chỉ: </p>
        <span><?=$detail['address']?></span>
    </div>
    <div class="inf-order">
        <p>Ngày nhận phòng: </p>
        <span><?=$detail['start_date']?></span>
    </div>
    <div class="inf-order">
        <p>Ngày trả phòng: </p>
        <span><?=$detail['end_date']?></span>
    </div>
    
    <h5 style="font-weight: bold;">Thông tin phòng</h5>
    <div class="inf-order">
        <p>Tên phòng: </p>
        <span><?=$detail['name']?></span>
    </div>
    <div class="inf-order">
        <p>Giá phòng theo ngày: </p>
        <span><?=$detail['price']?> VNĐ</span>
    </div>
    <div class="inf-order">
        <p>Tổng số tiền cần thanh toán: </p>
        <span style="color: red;font-weight: bold;"><?=$detail['total_price']?> VNĐ</span>
    </div>
<?php }?>

</div>
</div>