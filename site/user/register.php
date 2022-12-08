<div class=" d-flex justify-content-center align-items-center">
    <div style="margin-top: 170px; margin-bottom: 70px;" class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card bg-white">
                    <div class="card-body p-5">
                    
                        <form class="mb-3 mt-md-4" action="index.php?action=register" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Levart Customer</h2>
                            <?php if(empty($thongbao)){?>
                            <!-- <p class=" mb-5">Please enter your login and password!</p> -->
                            <?php }else{?>
                            <div class="alert alert-success" role="alert">
                                <strong><?=$thongbao;?></strong>
                            </div>
                            <?php } ?>
                            <div class="mb-3">
                                <label class="form-label ">Name</label>
                                <input type="text" class="form-control" placeholder="Nguyen Duy Tan" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label ">Username</label>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label class="form-label ">Phone</label>
                                <input type="text" class="form-control" placeholder="Phone number" name="phone">
                            </div>
                            <div class="mb-3">
                                <label class="form-label ">Email</label>
                                <input type="email" class="form-control" placeholder="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label ">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="*******"
                                    name="password">
                            </div>
                            <div class="d-grid">
                                <!-- <button class="btn btn-outline-dark" type="submit" name="register">Register</button> -->
                                <input class="btn btn-outline-dark" type="submit" name="register" value="Register">
                            </div>
                        </form>
                        <div>
                            <p class="mb-0  text-center">Already have an account ? <a href="index.php?action=login"
                                    class="text-primary fw-bold">Sign
                                    In</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<div style="margin-top: 250px;" class="container">
    <h1>đăng ký</h1>
    <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
    <form action="index.php?action=register" method="post">
        name <input type="text" name="name">
        username<input type="text" name="username">
        phone <input type="text" name="phone">
        email <input type="text" name="email">
        address <input type="text" name="address">
        pass <input type="text" name="password">
        <input type="submit" name="register" value="đăng ký">
    </form>
</div> -->