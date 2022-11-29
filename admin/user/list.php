<main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách khách hàng</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
            <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=list_user" title="Thêm"><i class="fas fa-plus"></i>
                  Danh sách</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" href="index.php?act=add_user" title="Thêm"><i class="fas fa-plus"></i>
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
                    <th>NAME</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                </tr>
              </thead>
                <?php foreach ($list_user as $user) {
                    extract($user);
                    $sua_user="index.php?act=sua_user&id=".$id;
                    $delete_user="index.php?act=delete_user&id=".$id;
                    ?>
                    <tr>
                        <td width="10"><input type="checkbox" id="all"></td>
                        <td><?= $name ?></td>
                        <td><?= $username ?></td>
                        <td><?= $password ?></td>
                        <td><?= $email ?> </td>
                        <td><?= $phone ?></td>
                        <td><?= $address ?></td>
                        <td>
                            <button class="xoa1 btn btn-primary btn-sm trash" type="button" title="Xóa">
                                <a href="<?= $delete_user ?>"><i class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="sua1 btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp">
                                <a  href="<?= $sua_user ?>"><i class="fas fa-edit"></i></a>
                            </button>
                        </td>
                    </tr>
                    <?php  }?>
                
            </table>
           
          </div>
        </div>
      </div>
    </div>
  </main>