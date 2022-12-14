<style>
    .card-body {
        text-align: center;
    }
    .card {
        margin-top: 100px 0 50px;
    }
</style>

<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card bg-white">
                    <div class="card-body p-5">

                        <img width="450" height="450px" src="https://img.vietqr.io/image/970436-1013045452-compact2.jpg?amount=<?=$_GET['price'];?>&addInfo=<?=$_GET['content'];?>&accountName=Nguyen Duy Tan"
                            alt="">
                            <a href="index.php?action=success" class="btn btn-success btn-block" >Xác nhận đã chuyển khoản</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>