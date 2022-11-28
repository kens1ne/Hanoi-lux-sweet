<h1>Đăng nhập</h1>
<?php
	if(isset($_SESSION['user'])) {
		extract($_SESSION['user']);
?>
	<div class="login" id="container">
		<div class="form-container sign-in-container">
			<img  src="https://scontent.fhan14-2.fna.fbcdn.net/v/t39.30808-1/241417878_702686897791464_4411455905979060956_n.jpg?stp=dst-jpg_p240x240&_nc_cat=106&ccb=1-7&_nc_sid=7206a8&_nc_ohc=vIiw18DeF04AX9Op-2F&_nc_ht=scontent.fhan14-2.fna&oh=00_AfCMY70GBmOoZkQKg7IPbbDmh1RJAqS9e6zzWSldnFGXxg&oe=6388B02A" alt="">
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1 class="login-title">Xin chào <?=$name?>!</h1>
					<p>Rất hận hạnh được phục vụ bạn</p>
					<button class="btns" class="ghost" id="signUp">Cập nhật tài khoản</button>
					<button style="margin: 15px 0;" class="btns" class="ghost" id="signUp">Đổi mật khẩu</button>
					<button class="btns" class="ghost" id="signUp"><a href="index.php?action=out">Đăng xuất</a></button>
				</div>
			</div>
		</div>
	</div>
	<?php
	} else {

	
?>


	<div class="login" id="container">
		<div class="form-container sign-in-container">
			<form class="form" action="index.php?action=login" method="post">
				<h1 class="login-title">Đăng nhập</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span class="sub-title">Hoặc sử dụng tài khoản của bạn</span>
				<input type="text" name="user" placeholder="Username" />
				<input type="password" name="pass" placeholder="Password" />
				<a class="a" href="#">Quên mật khẩu?</a>
				<input type="submit" class="btns" value="Đăng nhập" name="login">

			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1 class="login-title">Xin chào bạn!</h1>
					<p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
					<button class="btns" class="ghost" id="signUp"><a id="a" href="index.php?action=register">Đăng ký</a></button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
