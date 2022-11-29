<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card bg-white">
                    <div class="card-body p-5">
                        <form class="mb-3 mt-md-4" action="index.php?action=register" method="POST">
                            <h2 class="fw-bold mb-2 text-uppercase ">Levart Customer</h2>
                            <?php if(empty($thongbao)){?>
                            <p class=" mb-5">Please enter your login and password!</p>
                            <?php }else{?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?=$thongbao;?></strong>
                            </div>
                            <?php } ?>
                            <div class="mb-3">
                                <label class="form-label ">Name</label>
                                <input type="text" class="form-control" placeholder="Nguyen Duy Tan" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label ">Username</label>
                                <input type="text" class="form-control" placeholder="userame" name="username">
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
                                <button class="btn btn-outline-dark" type="submit" name="register">Register</button>
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