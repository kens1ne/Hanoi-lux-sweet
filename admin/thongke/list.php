<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách loại Phòng</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h6 class="tile-title">Đã thống kê</h6>

          <div class="row mb10">
                <a class="btn btn-add btn-sm" href="index.php?act=bieudo" title="Thêm">
                  Xem biểu đồ</a>
            </div>
            
          <div class="tile-body">
            <div class="row element-button">
            

<div class="hop pr-40px">
    <div class="">
        <div class=" frmtitle">
        </div>
        <div class=" frmcontent">
            <div class=" mb10 frmthongke">
                <table border="1">
                    <tr>
                        <th>LOẠI PHÒNG</th>
                        <th>SỐ LƯỢNG PHÒNG</th>
                        <th>GIÁ CAO NHÂT</th>
                        <th>GIÁ THẤP NHÂT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php foreach ($listthongke as $thongke) {
                        extract($thongke);
                    ?>
                        <tr>
                            <td><?= $name ?></td>
                            <td><?= $so_luong ?></td>
                            <td><?= number_format($price_max) ?> VNĐ</td>
                            <td><?= number_format($price_min) ?> VNĐ</td>
                            <td><?= number_format($price_avg) ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>