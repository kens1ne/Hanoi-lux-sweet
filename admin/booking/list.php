<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách Đặt phòng</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
            <!-- <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=listhh" title="Thêm"><i class="fas fa-plus"></i>
                  Danh sách</a>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=addhh" title="Thêm"><i class="fas fa-plus"></i>
                  Nhập thêm</a>
            </div> -->
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
                  
                  <th>Tên người đặt</th>                  
                  <!-- <th>Hình</th> -->
                  <th>Số điện thoại</th>
                  <th>Email</th>
                  <th>Đơn giá</th>
                  <th>Ngày</th>
                  <th>Ngày vào</th>
                  <th>Ngày ra</th>
                  <th>Trạng thái</th>
                  <th>Chức năng</th>
                </tr>
              </thead>
                <?php
                foreach ($listbooking as $booking) {
                    extract($booking);
                    // $hinhpath = "../upload/" . $image;
                    //     if (is_file($hinhpath)) {
                    //         $image = "<img src='" . $hinhpath . "' width='100px' height='auto'>";
                    //     } else {
                    //         $image = "NO photo";
                    //     }
                        // $suahanghoa = "index.php?act=suahanghoa&id=" . $id;
                        $xoabooking = "index.php?act=xoabooking&id=" . $id;
                    ?>
                    <tr>
                            <td><?= $id ?></td>
                            <td><?= $name_booking ?></td>
                            <!-- <td><?= $image ?></td> -->
                            <td><?=$phone ?></td>
                            <td><?=$email?></td>
                            <td><?= number_format($total_price) ?> VNĐ</td>
                            <td><?=$date?></td>
                            <td><?=$check_in?></td>
                            <td><?=$check_out?></td>
                            <td><?=$status?></td>
                        <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa">
                                <a href="<?= $xoabooking?>"><i class="fas fa-trash-alt"></i>Xóa</a>
                            </button>
                            <!-- <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp">
                                <a  href="<?= $suahanghoa ?>"><i class="fas fa-edit"></i></a>
                            </button> -->
                        </td>
                    </tr>
                    <?php  }?>
                
            </table>
           
          </div>
        </div>
      </div>
    </div>
  </main>