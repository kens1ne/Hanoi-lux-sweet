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
                    <a href="index.php" class="">
                        <img width="150" src="../public/img/logo.png" alt="">
                    </a>
                </div>
                <ul class="menu">
                    <li><a href="#" class="nav-link px-4 fs-5 ">News</a></li>
                    <li><a href="#" class="nav-link px-4 fs-5 ">Contact</a></li>
                    <?php if(empty($_SESSION['user'])){?>
                    <li><a href="index.php?action=login" class="nav-link px-4 fs-5 ">Sign In</a></li>
                    <li><a href="index.php?action=register" class="nav-link px-4 fs-5 ">Sign Up</a></li>
                    <?php } else{?>
                    <li><a href="index.php?action=profile"
                            class="nav-link px-4 fs-5 "><?=$_SESSION['user']['name'];?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </header>