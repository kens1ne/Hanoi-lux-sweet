<div class="content">
    <div class="detail">
        <div class="title-detail">
            <div class="sub-title">
                <span>Căn hộ</span>
                <h1><?=$info['name'];?></h1>
            </div>
            <div class="price-detail">
                <span>Giá bắt đầu từ:</span>
                <p><?=number_format($info['price'])?> ₫ <span>mỗi đêm</span></p>
                <div class="booking-room">
                    <button>Đặt ngay</button>
                </div>
            </div>
        </div>
        <div class="main-detail">
            <div class="detail-left">
                <div class="owl-carousel owl-theme img-room">
                    <?php
                            foreach($room_image as $key => $element) {
                                echo '<div class="">';
                                if ($key === array_key_first($room_image)){
                                    echo '<a href=""><img class="w-full" src="'.$element['image'].'" alt=""></a>';
                                }else{
                                    echo '<a href=""><img class="w-full" src="'.$element['image'].'" alt="" class="img-change"></a>';
                                }
                                echo '</div>';
                            }
                            ?>
                </div>
                <div class="inf-room">
                    <div class="inf-left">
                        <p>Thông tin chi tiết</p>
                        <div class="sub-inf">
                            <i class="fa-solid fa-users"></i>
                            <span>Số người: </span>
                            <p>2</p>
                        </div>
                        <div class="sub-inf">
                            <i class="fa-solid fa-users-viewfinder"></i>
                            <span>Lượt xem: </span>
                            <p>chế độ xem thường chú</p>
                        </div>
                        <div class="sub-inf">
                            <ion-icon name="expand-outline"></ion-icon>
                            <span>Kích thước: </span>
                            <p>119m²</p>
                        </div>
                        <div class="sub-inf">
                            <i class="fa-solid fa-bed"></i>
                            <span>Loại giường: </span>
                            <p>2 giường cỡ queen</p>
                        </div>
                        <div class="sub-inf">
                            <i class="fa-solid fa-bookmark"></i>
                            <span>Thể loại: </span>
                            <p>căn hộ</p>
                        </div>
                    </div>
                    <div class="inf-right">
                        <p>Tiện nghi</p>
                        <div class="nav-inf">
                            <h5>Phòng tắm & Đồ vệ sinh cá nhân</h5>
                        </div>
                        <div class="convenien">
                            <div class="sub-convenien">
                                <div class="nav-inf">
                                    <i class="fa-regular fa-person-booth"></i>
                                    <span>Phòng tắm phụ</span>
                                </div>
                                <div class="nav-inf">
                                    <i class="fa-solid fa-shirt"></i>
                                    <span>Áo choàng tắm</span>
                                </div>
                                <div class="nav-inf">
                                    <i class="fa-solid fa-bath"></i>
                                    <span>Vòi hoa sen & bồn tắm</span>
                                </div>
                                <div class="nav-inf">
                                    <i class="fa-solid fa-people"></i>
                                    <span>Nhà vệ sinh phụ</span>
                                </div>
                            </div>
                            <div class="sub-convenien">
                                <div class="nav-inf">
                                    <i class="fa-solid fa-users"></i>
                                    <span>Nhà vệ sinh phụ</span>
                                </div>
                                <div class="nav-inf">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Điện thoại phòng tắm</span>
                                </div>
                                <div class="nav-inf">
                                    <i class="fa-solid fa-shower"></i>
                                    <span>Vòi hoa sen và phòng tắm</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="detail-booking">
                    <h1>Hinh thức đặt phòng</h1>
                    <span>Các trường bắt buộc được theo sau bởi *</span>
                    <div class="check-in">
                        <div class="search-item border-input">
                            <p>Ngày nhận phòng</p>
                            <input type="date" placeholder="Nhập số phòng">
                        </div>
                        <div class="search-item border-input">
                            <p>Ngày trả phòng</p>
                            <input type="date" placeholder="Nhập số phòng">
                        </div>
                        <div class="booking-room">
                            <button>Đặt ngay</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-right">
                <div class="content-detail">
                    <img src="./acess/img/banner-ads.jpg" alt="">
                </div>
                <div class="content-detail">
                    <h1>Hỗ trợ khách hàng</h1>
                    <p>Điện thoại: +84 2253 880 888</p>
                    <p>Fax: +84 2253 880 688</p>
                    <p>Email: <a href="">info@pearlriverhotel.vn</a></p>
                </div>
                <div class="content-detail">
                    <h1>Địa chỉ của chúng tôi</h1>
                    <p>Km 8 Đường Phạm Văn Đồng, Quận</p>
                    <p>Dương Kinh, Hải Phòng</p>
                    <p>Việt Nam</p>
                </div>
            </div>
        </div>
    </div>
</div>