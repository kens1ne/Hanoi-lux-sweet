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
            <div class="tile-body">
            <div class="row element-button">
            <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=listcate" title="Thêm"><i class="fas fa-plus"></i>
                  Danh sách</a>
              </div>
              
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=addcate" title="Thêm"><i class="fas fa-plus"></i>
                  Nhập thêm</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
              </div>
            </div>
            <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
              id="sampleTable">
              <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="all"></th>
                  <th>Mã Loại</th>
                  <th>Tên Loại</th>
                  <th>Mô tả</th>
                </tr>
              </thead>
                <?php
                foreach ($listcate as $cate) {  
                    extract($cate);
                    $suacate="index.php?act=suacate&id=".$id;
                    $xoacate="index.php?act=xoacate&id=".$id;
                    echo'<tr>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$description.'</td>
                        <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa">
                                <a href="'.$xoacate.'"><i class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp">
                                <a  href="'.$suacate.'"><i class="fas fa-edit"></i></a>
                            </button>
                        </td>
                        </tr>';
                }
                ?>
            </table>
            <div class="p-3 mb-2 bg-success text-dark">
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;  
                ?>
            </div>
          </div>

            </div>

        </div>
    </div>
</main>