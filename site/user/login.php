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
	<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card bg-white">
                    <div class="card-body p-5">
                        <form class="mb-3 mt-md-4" action="index.php?action=login" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Levart Customer</h2>
                            <?php if(empty($thongbao)){?>
                            <p class=" mb-5">Please enter your login and password!</p>
                            <?php }else{?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?=$thongbao;?></strong>
                            </div>
                            <?php } ?>

                            <div class="mb-3">
                                <label class="form-label ">Username</label>
                                <input type="text" class="form-control" placeholder="username" name="user">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label ">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="*******"
                                    name="pass">
                            </div>
                            <div class="d-grid">
								<input type="submit" class="btn btn-outline-dark" value="Đăng nhập" name="login">
                            </div>
                        </form>
                        <div>
                            <p class="mb-0  text-center">Don't have an account? <a href="index.php?action=register"
                                    class="text-primary fw-bold">Sign
                                    Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

