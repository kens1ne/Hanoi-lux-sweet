<div class="content">
    <div class="detail-search">
        <div class="search-right">
            <div class="sub-rooms">
                <h3>Tìm</h3>
                <form action="index.php" method="GET">
                    <input type="hidden" name="action" value="search">
                    <div class="des">
                        <p>Tìm chỗ nghỉ / điểm đến: </p>
                        <div class="form-control">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" placeholder="Bạn muốn đến đâu?">
                        </div>
                    </div>
                    <div class="des">
                        <p>Ngày nhận phòng</p>
                        <div class="form-control">
                            <i class="fa-solid fa-calendar-days"></i>
                            <input type="date" name="start_date">
                        </div>
                    </div>
                    <div class="des">
                        <p>Ngày trả phòng</p>
                        <div class="form-control">
                            <i class="fa-solid fa-calendar-days"></i>
                            <input type="date" name="end_date">
                        </div>
                    </div>
                    <div class="amount">
                        <div class="des">
                            <p>Số người</p>
                            <div class="buttons_added">
                                <input class="minus is-form" type="button" value="-">
                                <input aria-label="quantity" class="input-qty" max="10" min="1" name="quantity"
                                    type="number" value="1">
                                <input class="plus is-form" type="button" value="+">
                            </div>
                        </div>
                    </div>
                    <div class="search-item">
                        <button class="des-btn" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="search-left">
            <h3>Levart tìm thấy <?=count($rooms);?> phòng trống</h3>
            <?php 
            foreach($rooms as $value){ 
            $image = explode(",",$value['image']);
            ?>
            <div class="list-room">
                <div class="room-img">
                    <img src="<?=$image[0];?>" alt="">
                </div>
                <div class="room-inf">
                    <div class="list-star room-star">
                        <h3><?=$value['name'];?></h3>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                    <div class="room-location">
                        <p><?=$value['address'];?></p>
                    </div>
                    <span><i class="fa-solid fa-leaf"></i>Chỗ nghỉ cao cấp</span>
                    <div class="bed">
                        <h5>Phòng giường đôi</h5>
                        <span>Chỉ còn 1 phòng với giá này trên trang của chúng tôi</span>
                    </div>
                </div>
                <div class="room-price">
                    <div class="evaluate">
                        <div class="sub-evaluate">
                            <p>Rất tốt</p>
                            <span>193 đánh giá</span>
                        </div>
                        <div class="point">
                            <p>8,3</p>
                        </div>
                    </div>
                    <div class="booking-room">
                        <p class="quantity-people">2 người lớn</p>
                        <p class="price">1.155.624 đ<span>/phòng</span></p>
                        <p class="booking-tax">Đã bao gồm thuế và phí</p>
                        <a
                            href="index.php?action=detail&id=<?=$value['id'];?>&start_date=<?=$_GET['start_date'];?>&end_date=<?=$_GET['end_date'];?>">Đặt
                            phòng</a>
                    </div>
                </div>
            </div>
            <?php } ?>


        </div>
    </div>
</div>