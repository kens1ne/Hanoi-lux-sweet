        <!-- Banner -->
        <section>
            <div class="background position-relative">
                <video id="background-video" width="100%" height="100%" playsinline muted autoplay loop>
                    <source src="../public/img/banner.mp4" type="video/mp4">
                </video>
                <!-- <audio id="audio" autoplay>
                    <source src="../public/img/audio-banner.mp3" type="audio/mpeg">
                </audio> -->
                <div class="volume">
                    <span onclick="mute()">
                        <ion-icon name="volume-high-outline"></ion-icon>
                    </span>
                </div>
            </div>
        </section>
        <!-- Booking -->
        <div class="search-container">
            <form action="index.php" method="GET" class="booking">
                <input type="hidden" name="action" value="search" />
                <h3>Đặt khách sạn tại Hà Nội :</h3>
                <div class="search-item">
                    <span>Nhận Phòng (Check-in)</span>
                    <input type="date" placeholder="Nhập số phòng" name="start_date">
                </div>
                <div class="search-item">
                    <span>Trả Phòng (Check-out)</span>
                    <input type="date" placeholder="Nhập số phòng" name="end_date">
                </div>
                <div class="search-item">
                    <button type="submit">Search</button>
                </div>
            </form>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="introduce">
                <div class="introduce-left">
                    <p class="introduce-title" data-aos="fade-right" data-aos-duration="1500">Sự chào đón nồng nhiệt đang chờ bạn tại khách sạn<span style=""> Levart
                            Dream</span></p>
                    <div class="introduce-border">
                        <span></span>
                    </div>
                    <div class="introduce-des">
                        <p data-aos="fade-right" data-aos-duration="1500">Khách sạn Pearl River là khách sạn 5 sao đầu tiên tại thành phố Hải Phòng, chỉ cách trung tâm
                            thành phố Hải Phòng 5 phút lái xe, gần Sân bay Quốc tế Cát Bi và Trung tâm Triển lãm Hải
                            Phòng mới, và chỉ cách Đồ Sơn nổi tiếng 15 km. Bãi biển.</p>
                        <p data-aos="fade-right" data-aos-duration="1500">Với thiết kế cổ điển và nội thất trang nhã, Khách sạn Pearl River đã thu hút khách trong nước
                            và quốc tế trong hơn một thập kỷ qua.</p>
                        <p data-aos="fade-right" data-aos-duration="1500" class="introduce-text">Polytenhnic</p>
                        <p data-aos="fade-right" data-aos-duration="1500" style="font-size:25px;">Polytenhnic - Tổng giám đốc</p>
                    </div>
                </div>
                <div class="introduce-right">
                    <div class="introduce-img-sub">
                        <div class="list-img-sub">
                            <img data-aos="fade-left" data-aos-duration="1500" src="../public/img/content-img/img1.jpg" onclick="zoom(this)" alt="image">
                        </div>
                        <div class="list-img-sub">
                            <img data-aos="fade-left" data-aos-duration="1500" src="../public/img/content-img/img2.jpg" onclick="zoom(this)" alt="image">
                        </div>
                        <div class="list-img-sub">
                            <img data-aos="fade-left" data-aos-duration="1500" src="../public/img/content-img/img3.jpg" onclick="zoom(this)" alt="image">
                        </div>
                    </div>
                    <div class="introduce-img-main">
                        <div id="fame" class="list-img-main">
                            <img  src="../public/img/content-img/main-photo.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-room">
                <div class="cover">
                    <div class="content-title">
                        <p>Luxury</p>
                    </div>
                    <div class="content-sub-title">
                        <h3 data-aos="fade-up" data-aos-duration="1500">Rooms & Suites</h3>
                        <p data-aos="fade-up" data-aos-duration="1500">CLASSIC STYLE AND COMPORT</p>
                    </div>
                </div>
                <div class="content-border-bottom">
                    <span></span>
                </div>
                <div class="grid">
                    <?php foreach( $rooms as $data){
                    $image = explode(",", $data['image']);
                ?>
                    <div class="grid-column-4">
                        <div class="box-hover">
                            <?php
                            foreach($image as $key => $element) {
                                if ($key === array_key_first($image)){
                                    echo '<a href="index.php?action=detail&id='.$data['id'].'"><img data-aos="fade-up" data-aos-duration="1500" src="'.$element.'" alt=""></a>';
                                }else{
                                    echo '<a href=" index.php?action=detail&id='.$data['id'].'"><img data-aos="fade-up" data-aos-duration="1500" src="'.$element.'" alt="" class="img-change"></a>';
                                }
                            }
                            ?>
                        </div>
                        <!-- <div class="point">9</div> -->
                        <h3 data-aos="fade-up" data-aos-duration="1500" class="product-title"><?=$data['name']?></h3>
                        <div class="star">
                            <div data-aos="fade-up" data-aos-duration="1500" class="list-star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1500" class="location"><?=$data['address']?></div>
                        </div>
                        <p data-aos="fade-up" data-aos-duration="1500" class="description"><?=$data['description']?></p>
                        <div class="option-room">
                            <p data-aos="fade-up" data-aos-duration="1500" class="price"><?=number_format($data['price'])?><span>/phòng</span></p>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>