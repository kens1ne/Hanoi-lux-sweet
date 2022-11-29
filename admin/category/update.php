<?php 
    if(isset($dm)) {
        extract($dm);
    }

?>
<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách loại Phòng</li>
        <li class="breadcrumb-item"><a href="#">Thêm loại Phòng</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Cập nhật loại Phòng</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a href="index.php?act=listcate"><input class="btn btn-add btn-sm" type="button" value="Danh sách"></a>
              </div>
            </div>
              <form class="row" action="index.php?act=updatecate" method="post">
                  <!-- <div class="form-group col-md-3">
                    <p class="control-label">Mã loại</p>
                    <input class="form-control" type="text" name="id_loai">
                  </div> -->

                  <div class="form-group col-md-3">
                    <p class="control-label">Tên loại</p>
                    <input class="form-control" type="text" name="name" value="<?php if(isset($name) && ($name!="")) echo $name ; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Mô tả</p>
                    <input class="form-control" type="text" name="description" value="<?php if(isset($description) && ($description!="")) echo $description ; ?>">
                  </div>
                  <input type="hidden" name="id" value="<?php if(isset($id) && ($id>0)) echo $id ;?> ">
                  <button type="submit" class="btn btn-secondary"name="capnhat">Cập nhật</button>
                  <!-- <button class="btn btn-save" type="submit" name="them_moi">Thêm mới</button> -->
                  <button style="margin: 0 10px;" class="btn btn-danger" type="reset" name="">Nhập lại</button>
            </form>
            <div class="p-3 mb-2 bg-success text-dark">
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;  
                ?>
            </div>
          </div>
       
    </div>
</main>
