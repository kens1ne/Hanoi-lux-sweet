<?php
if (is_array($user)) { //hàm kiểm tra biến có phải là một mảng không,
    extract($user);
    //extract là hàm trả về các biến trong mảng 
}
?>
<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách khách hàng</li>
        <li class="breadcrumb-item"><a href="#">Sủa khách hàng</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Sửa khách hàng</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a href="index.php?act=listkh"><input class="btn btn-add btn-sm" type="button" value="Danh sách"></a>
              </div>
            </div>
            <div class="p-3 mb-2 bg-success text-dark">
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;  
                ?>
            </div>
              <form class="row"  action="index.php?act=update_user" method="post" enctype="multipart/form-data">

              <div class="form-group col-md-3">
                    <p class="control-label">Name</p>
                    <input class="form-control" type="text" name="name" value="<?= $name ?>">
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Username</p>
                    <input class="form-control" type="text" name="username" value="<?= $username ?>">
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Password</p>
                    <input class="form-control" type="password" name="password" value="<?= $password ?>">
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Email</p>
                    <input class="form-control" type="email" name="email" value="<?= $email ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Phone</p>
                    <input class="form-control" type="text" name="phone" value="<?= $phone ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Address</p>
                    <input class="form-control" type="text" name="address" value="<?= $address ?>">
                  </div>      
                <input type="hidden" name="id" value="<?= $id ?>">
                <input class="btn btn-info" type="submit" name="capnhat" value="Cập nhật">
                <input style="margin: 0 10px;" class="btn btn-danger" type="reset" value="Nhập lại">
            </form>
           
          </div>
        </div>
  </main>