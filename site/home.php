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
                                    echo '<a href="index.php?action=detail&id='.$data['id'].'"><img src="'.$element.'" alt=""></a>';
                                }else{
                                    echo '<a href=" index.php?action=detail&id='.$data['id'].'"><img src="'.$element.'" alt="" class="img-change"></a>';
                                }
                            }
                            ?>
                        </div>
                        <!-- <div class="point">9</div> -->
                        <h3 class="product-title"><?=$data['name']?></h3>
                        <div class="star">
                            <div class="location"><?=$data['address']?>
                            </div>
                        </div>
                        <div class="option-room">
                            <p class="price">
                                <?=number_format($data['price'])?> VNĐ<span> / đêm</span></p>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>