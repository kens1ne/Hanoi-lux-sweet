<h1>Đăng lý tài khoản</h1>
<form id="form" action="index.php?action=register" method="post">
    <input type="text" name="name" id="" placeholder="họ tên">
    <input type="text" name="user" id="" placeholder="user">
    <input type="text" name="pass" id="" placeholder="pass">
    <input type="submit" value="Đăng ký" name="register">
	<a href="index.php?action=login">Đăng nhập</a>
</form>


<h2>
    <?php
        if(isset($thongbao) && ($thongbao!="")) {
            echo $thongbao;
        }
    ?>
</h2>
<!--         
<div class="login" id="container">
		<div class="form-container sign-in-container ">
			<form class="form color-register-left">
				<h1 class="login-title">Chào mừng trở lại!</h1>
				<span class="sub-title">Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</span>
                <button class="btns" class="ghost" id="signUp"><a id="a" href="index.php?action=login">Đăng nhập</a></button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">

    <input type="text" name="name" id="" placeholder="họ tên">
    <input type="text" name="user" id="" placeholder="user">
    <input type="text" name="pass" id="" placeholder="pass">
    <input type="submit" value="Đăng ký" name="register">
	<a href="index.php?action=login">Đăng nhập</a>
</form>

                <form action="index.php?action=register" method="post">
                    <div class="overlay-panel overlay-right color-register">
                        <h1 style="color: #000;" class="login-title">Tạo tài khoản</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <p style="color: #000;">Hoặc sử dụng email của bạn để đăng ký</p>
                        <input class="btn-register" type="text" name="name" placeholder="Name">
                        <input class="btn-register" type="text" name="user" placeholder="Username">
                        <input class="btn-register" type="password" name="pass" placeholder="Password">
                        <button class="btns" class="ghost" id="signUp"><a href="index.php?action=register">Đăng ký</a></button>
                        <!-- <button type="submit" class="btns" class="ghost" id="signUp">Đăng ký</button> -->
                        
                    </div>
                </form>
			</div>
		</div>
	</div> -->