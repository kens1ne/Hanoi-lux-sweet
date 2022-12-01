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
                <a class="btn btn-add btn-sm" href="index.php?act=listroom" title="Thêm"><i class="fas fa-plus"></i>
                  Danh sách</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=addroom" title="Thêm"><i class="fas fa-plus"></i>
                  Nhập thêm</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
              </div>
            </div>
            <div class="p-3 mb-2 bg-success text-dark">
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;  
                ?>
            </div>
            <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
              id="sampleTable">
              <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="all"></th>
                  
                  <!-- <th>Mã Loại</th> -->
                  <th>Tên Phòng</th>
                  <th>Đơn Giá</th>
                  <th>Mô tả</th>
                  <th>Địa chỉ</th>
                  <th>Số lượng người</th>
                  <th>Trạng thái</th>
                  <th>Loại phòng</th>
                  <th>Chức năng</th>

                </tr>
              </thead>
                <?php
                foreach ($listrooms as $room) {
                    extract($room);
                    
                    $suaroom="index.php?act=suaroom&id=".$id;
                    $xoaroom="index.php?act=xoaroom&id=".$id;
                    ?>
                    <tr>
                    <td><?= $id ?></td>
                    <td><?= $name ?></td>
                    <td><?= $price?> VNĐ</td>            
                    <td><?= $description ?></td>
                    <td><?= $address ?></td>
                    <td><?=$quantity_people?></td>
                    <td><?=$status?></td>
                    <td><?=$id_cate?></td>
                    <td>
                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa">
                            <a href="<?= $xoaroom?>"><i class="fas fa-trash-alt"></i>Xóa</a>
                        </button>
                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp">
                            <a  href="<?= $suaroom ?>"><i class="fas fa-edit"></i>Sửa</a>
                        </button>
                    </td>
                    </tr>
                    <?php  }?>
                
            </table>
        </div>
            
        </div>
    </div>

</main>
