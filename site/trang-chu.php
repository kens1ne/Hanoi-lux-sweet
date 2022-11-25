<body>
    <div id="container">
        <!-- Header -->
        <header>
            <div class="header">
                <ul class="menu">
                    <li><a href="#" class="nav-link px-4 fs-5 ">Home</a></li>
                    <li><a href="#" class="nav-link px-4 fs-5 ">About</a></li>
                    <li><a href="#" class="nav-link px-4 fs-5 ">Offers</a></li>
                    <li><a href="#" class="nav-link px-4 fs-5 ">Service</a></li>
                </ul>
                <div class="logo">
                    <a href="/" class="">
                        <img width="150" src="../public/img/logo.png" alt="">
                    </a>
                </div>
                <ul class="menu">
                    <li><a href="#" class="nav-link px-4 fs-5 ">News</a></li>
                    <li><a href="#" class="nav-link px-4 fs-5 ">Contact</a></li>
                    <li><button type="button" class="btn fs-5">Login</button></li>
                    <li><button type="button" class="btn fs-5">Sign-up</button></li>
                </ul>
            </div>
        </header>
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
            <div class="booking">
                <div class="search-item">
                    <span>Phòng muốn đặt</span>
                    <input type="text" placeholder="Nhập số phòng">
                </div>
                <div class="search-item">
                    <span>Check-in</span>
                    <input type="date" placeholder="Nhập số phòng">
                </div>
                <div class="search-item">
                    <span>Check-out</span>
                    <input type="date" placeholder="Nhập số phòng">
                </div>
                <div class="search-item">
                    <span>Người lớn</span>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-">
                        <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="1">
                        <input class="plus is-form" type="button" value="+">
                    </div>
                </div>
                <div class="search-item">
                    <span class="text-red">Bọn trẻ</span>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-">
                        <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="1">
                        <input class="plus is-form" type="button" value="+">
                    </div>
                </div>
                <div class="search-item">
                    <button>Search</button>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="introduce">
                <div class="introduce-left">
                    <p class="introduce-title">Sự chào đón nồng nhiệt đang chờ bạn tại khách sạn<span style=""> Levart
                            Dream</span></p>
                    <div class="introduce-border">
                        <span></span>
                    </div>
                    <div class="introduce-des">
                        <p>Khách sạn Pearl River là khách sạn 5 sao đầu tiên tại thành phố Hải Phòng, chỉ cách trung tâm
                            thành phố Hải Phòng 5 phút lái xe, gần Sân bay Quốc tế Cát Bi và Trung tâm Triển lãm Hải
                            Phòng mới, và chỉ cách Đồ Sơn nổi tiếng 15 km. Bãi biển.</p>
                        <p>Với thiết kế cổ điển và nội thất trang nhã, Khách sạn Pearl River đã thu hút khách trong nước
                            và quốc tế trong hơn một thập kỷ qua.</p>
                        <p class="introduce-text">Polytenhnic</p>
                        <p style="font-size:25px;">Polytenhnic - Tổng giám đốc</p>
                    </div>
                </div>
                <div class="introduce-right">
                    <div class="introduce-img-sub">
                        <div class="list-img-sub">
                            <img src="../public/img/content-img/img1.jpg" onclick="zoom(this)" alt="image">
                        </div>
                        <div class="list-img-sub">
                            <img src="../public/img/content-img/img2.jpg" onclick="zoom(this)" alt="image">
                        </div>
                        <div class="list-img-sub">
                            <img src="../public/img/content-img/img3.jpg" onclick="zoom(this)" alt="image">
                        </div>
                    </div>
                    <div class="introduce-img-main">
                        <div id="fame" class="list-img-main">
                            <img src="../public/img/content-img/main-photo.jpg" alt="">
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
                        <h3>Rooms & Suites</h3>
                        <p>CLASSIC STYLE AND COMPORT</p>
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
                                    echo '<a href=""><img width="350" src="'.$element.'" alt=""></a>';
                                }else{
                                    echo '<a href=""><img width="350" src="'.$element.'" alt="" class="img-change"></a>';
                                }
                            }
                            ?>
                        </div>
                        <!-- <div class="point">9</div> -->
                        <h3 class="product-title"><?=$data['name']?></h3>
                        <div class="star">
                            <div class="list-star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="location"><?=$data['address']?></div>
                        </div>
                        <p class="description"><?=$data['description']?></p>
                        <div class="option-room">
                            <p class="price"><?=number_format($data['price'])?><span>/phòng</span></p>
                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../public/js/style.js"></script>
</body>