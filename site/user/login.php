<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card bg-white">
                    <div class="card-body p-5">
                        <form class="mb-3 mt-md-4" action="index.php?action=login" method="POST">
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
                                <button class="btn btn-outline-dark" type="submit" name="login">Login</button>
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