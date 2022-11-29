<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách khách hàng</li>
        <li class="breadcrumb-item"><a href="#">Thêm khách hàng</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Thêm khách hàng</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a href="index.php?act=list_user"><input class="btn btn-add btn-sm" type="button" value="Danh sách"></a>
              </div>
            </div>
            <div class="p-3 mb-2 bg-success text-dark">
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;  
                ?>
            </div>
              <form class="row" action="index.php?act=add_user" method="post" enctype="multipart/form-data">
                  <div class="form-group col-md-3">
                    <p class="control-label">Name</p>
                    <input class="form-control" type="text" name="name">
                    <div class="loi"> <?php echo (isset($loi['name'])) ? $loi['name'] : ''; ?></div>
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Username</p>
                    <input class="form-control" type="text" name="username">
                    <div class="loi"> <?php echo (isset($loi3['username'])) ? $loi3['username'] : ''; ?></div>
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Password</p>
                    <input class="form-control" type="password" name="password">
                    <div class="loi"> <?php echo (isset($loi1['password'])) ? $loi1['password'] : ''; ?></div>
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Pe-enter password</p>
                    <input class="form-control" type="password" name="password1">
                    <div class="loi"> <?php echo (isset($loi2['password1'])) ? $loi2['password1'] : ''; ?></div>
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Email</p>
                    <input class="form-control" type="email" name="email">
                    <div class="loi"> <?php echo (isset($loi5['email'])) ? $loi5['email'] : ''; ?></div>
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Phone</p>
                    <input class="form-control" type="text" name="phone">
                    <div class="loi"> <?php echo (isset($loi3['phone'])) ? $loi3['phone'] : ''; ?></div>
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Address</p>
                    <input class="form-control" type="text" name="address">
                    <div class="loi"> <?php echo (isset($loi3['address'])) ? $loi3['address'] : ''; ?></div>
                  </div>
                  
                <input class="btn btn-info" type="submit" name="them" value="Thêm mới">
                <input style="margin: 0 10px;" class="btn btn-danger" type="reset" value="Nhập lại">
            </form>
           
          </div>
        </div>
  </main>