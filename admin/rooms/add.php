<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Phòng</li>
        <li class="breadcrumb-item"><a href="#">Thêm phòng</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới Phòng</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a href="index.php?act=listroom"><input class="btn btn-add btn-sm" type="button" value="Danh sách"></a>
              </div>
            </div>
            <div class="p-3 mb-2 bg-success text-dark">
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;  
                ?>
            </div>
              <form class="row" action="index.php?act=addroom" method="post" enctype="multipart/form-data">
                  <div class="form-group col-md-3">
                    <p class="control-label">Mã Phòng</p>
                    <input class="form-control" type="text" name="id" disabled>
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Tên Phòng</p>
                    <input class="form-control" type="text" name="name">
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Đơn giá</p>
                    <input class="form-control" type="text" name="price">
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Mô tả</p>
                    <input class="form-control" type="text" name="description">
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Địa chỉ</p>
                    <input class="form-control" type="text" name="address">
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Số lượng người</p>
                    <input class="form-control" type="number" name="quantity_people">
                  </div>
                  <div class="form-group col-md-3">
                    <p class="control-label">Trạng thái</p>
                    <input class="form-control" type="text" name="status">
                  </div>

                  <div class="form-group col-md-3">
                    <p class="control-label">Loại phòng</p>
                    <select name="id_cate" class="loai">
                        <?php
                        foreach ($listcate as $cate) {
                            extract($cate);
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                  </div>
                  

                  <button type="submit" class="btn btn-info"name="themmoi">Thêm mới</button>
                  <button style="margin: 0 10px;" class="btn btn-danger" type="reset" name="">Nhập lại</button>
            </form>
        </div>
            
        </div>
    </div>

</main>