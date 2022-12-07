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
            </div>
        </div>
        <div class="row my-4">
            <div class="col-8">
                <div class="owl-carousel owl-theme">
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
                    <div class="row bg-light py-8">
                        <div class="col-6">
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
                        <div class="col-6">
                            <p>Tiện nghi</p>
                            <div class="nav-inf">
                                <h5>Phòng tắm & Đồ vệ sinh cá nhân</h5>
                            </div>
                            <div class="convenien">
                                <div class="sub-convenien">
                                    <div class="nav-inf">
                                        <i class="fa-solid fa-person-booth"></i>
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
                            <div class="nav-inf">
                                <h5>Dịch vụ</h5>
                                <?php foreach($services as $value) {?>
                                <div class="nav-inf">
                                    <i class="fa-solid fa-info"></i>
                                    <span><?=$value;?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <p><?=$info['description']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="content-detail">
                    <img src="../public/img/banner-ads.jpg" alt="" class="w-full">
                </div>
                <div class="content-detail">
                    <h1>Thông tin đặt phòng</h1>
                    <p><i class="fa fa-map-marker"></i> <?=$info['address'];?></p>
                    <form action="index.php?action=booking" method="POST">
                        <div class="des">
                            <p>Ngày nhận phòng</p>
                            <div class="form-control">
                                <i class="fa-solid fa-calendar-days"></i>
                                <input type="date" name="start_date" value="<?=$_GET['start_date'];?>">
                            </div>
                        </div>
                        <div class="des">
                            <p>Ngày trả phòng</p>
                            <div class="form-control">
                                <i class="fa-solid fa-calendar-days"></i>
                                <input type="date" name="end_date" value="<?=$_GET['end_date'];?>">
                            </div>
                        </div>
                        <input type="hidden" name="id_room" value="<?=$info['id'];?>">
                        <div class="order my-2">
                            <button type="submit" class="btn btn-danger btn-block" name="booking">Đặt ngay</button>
                        </div>
<<<<<<< HEAD
                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#comment").load("../site/comment/form_comment.php", {idpro: <?=$id_room?>});
                    });
                </script>
                <div class="comment" id="comment">
                    <h1>bình luận</h1>
                </div>
            </div>
            <div class="detail-right">
                <div class="content-detail">
                    <img src="./acess/img/banner-ads.jpg" alt="">
=======
                    </form>
>>>>>>> origin/main
                </div>
                <div class="content-detail">
                    <h1>Hỗ trợ khách hàng</h1>
                    <p>Điện thoại: +84 2253 880 888</p>
                    <p>Fax: +84 2253 880 688</p>
                    <p>Email: <a href="">info@pearlriverhotel.vn</a></p>
                </div>
            </div>
        </div>
    </div>
</div>