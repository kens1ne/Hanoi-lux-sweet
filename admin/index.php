<?php
include "header.php";
include "../dao/pdo.php";
include "../dao/category.php";
include "../dao/room_dao.php";
include "../dao/booking.php";
include "../dao/thongke.php";
include "../dao/user.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        //Thêm danh mục - Category
        case 'addcate':
            // kiểm tra người dùng ấn thêm mới không
            if (isset($_POST['them_moi'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                insert_cate($name, $description);
                $thongbao ="Thêm thành công";
            }
            include "category/add.php";
            break;
        // Show category
        case 'listcate':
            
            $listcate = loadall();
            include "category/list.php";
            break;
        //Xóa category
        case 'xoacate':
            if (isset($_GET['id'])) {
                delete_cate($_GET['id']);
                $thongbao ="Xóa thành công";
            }
            $listcate = loadall();
            include "category/list.php";
            break;   
        // Sửa cate
        case 'suacate':
            if (isset($_GET['id'])) {
                $dm=loadone($_GET['id']);
            }
            include "category/update.php";
            break;  
        //Update cate    
        case 'updatecate':
            if (isset($_POST['capnhat'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                $description = $_POST['description'];
                update_cate($id,$name, $description);
                $thongbao ="Cập nhật thành công";
            }
            $listcate = loadall();
            include "category/list.php";
            break;
        //--- Phần Quản lí phòng------//
        case 'addroom':
            if (isset($_POST['themmoi'])) {
                $id_cate = $_POST['id_cate'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $address = $_POST['address'];
                $quantity_people = $_POST['quantity_people'];
                $status = $_POST['status'];
                insert_rooms($name, $price, $description,$address, $quantity_people, $status, $id_cate);
                $thongbao = "Thêm thành công";
            }
            $listcate = loadall();
            include "rooms/add.php";
            break;
        //list rooms
        case 'listroom':
            $listrooms = loadAll_rooms();
            include "rooms/list.php";
            break;
        // xóa phòng
        case 'xoaroom':
            if (isset($_GET['id']) && ($_GET['id'] >= 0)) {
                delete_rooms($_GET['id']); // hàm xóa hàng hóa
            }
            $listrooms = loadAll_rooms("",0);
            $thongbao = "Xóa thành công";
            include "rooms/list.php";
            break;
        //Sửa phòng
        case 'suaroom':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $room = loadOne_rooms($_GET['id']); // hàm load 1 sản phẩm trong ds hàng hóa
            }
            $listrooms = loadAll_rooms();
            include "rooms/update.php";
            break;  
        case 'updateroom':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id= $_POST['id'];
                $id_cate = $_POST['id_cate'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $address = $_POST['address'];
                $quantity_people = $_POST['quantity_people'];
                $status = $_POST['status'];
                update_rooms($id,$name, $price, $description,$address, $quantity_people, $status, $id_cate);
                $thongbao = "Cập nhật thành công";
            }  
            $listcate = loadall();  
            $listrooms = loadAll_rooms();
            include "rooms/list.php";
            break; 
            //--- Phần Quản lí Đặt phòng (Booking)------//  
        case 'listbooking':
            $listbooking = loadAll_booking();
            include "booking/list.php";
            break;   
        //--------------------Khách hàng----------------------//
            case 'add_user':
                //kiểm tra xem người dùng có click vào nút add hay không
                if (isset($_POST['them']) && ($_POST['them'])) {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $password1 = $_POST['password1'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    //phần kiểm tra rỗng
                    if ($name == '') {
                        $loi['name'] = 'Bạn chưa nhập mã khách hàng';
                    }
                    if ($password == '') {
                        $loi1['password'] = 'Bạn chưa nhập mật khẩu';
                    }
                    if ($password1 == '') {
                        $loi2['password1'] = 'Bạn chưa nhập mật khẩu';
                    } else if ($password1 != $password) {
                        $loi2['password1'] = 'Mật khẩu ko trùng nhau';
                    }
                    if ($username == '') {
                        $loi3['username'] = 'Bạn chưa nhập họ và tên khách hàng';
                    }
                    if ($phone == '') {
                        $loi3['phone'] = 'Bạn chưa nhập họ và tên khách hàng';
                    }
                    if ($email == '') {
                        $loi5['email'] = 'Bạn chưa nhập email khách hàng';
                    }
                    if ($address == '') {
                        $loi['address'] = 'Bạn chưa nhập mã khách hàng';
                    }
                    if ($name && $username && $password && $password1 && $email && $phone && $address!= '') {
                        insert_user($name, $username, $password,$email, $phone,$address); // hàm thêm mới loại
                        $thongbao = "Thêm khách hàng thành công";
                    }
                }
                include "user/add.php";
                break;
    
                //phần chức năng hiển thị danh sách khách hàng
            case 'list_user':
                $list_user = loadAll_user(); //hàm laod tất cả khách hàng
                include "user/list.php";
                break;
    
                //phần chức năng sửa thông tin khách hàng
            case 'sua_user':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $user = loadone_user($_GET['id']); // hàm load 1 khách hàng trong ds khách hàng
                    
                }
                include "user/update.php";
                break;
    
                //phần chức năng thêm mới khách hàng
            case 'update_user':
                //kiểm tra xem người dùng có click vào nút add hay không
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
    
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $id = $_POST['id'];
                    update_user($id, $name, $username, $password , $email, $phone,$address); // hàm cập nhật thông tin khách hàng
                    $thongbao = "Sửa khách hàng thành công";
                }
                $list_user = loadAll_user(); //hàm laod tất cả khách hàng
                include "user/list.php";
                break;
    
                //phần chức năng delete khách hàng
            case 'delete_user':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_user($_GET['id']); // hàm xóa khách hàng
                }
                $list_user = loadAll_user(); //hàm laod tất cả khách hàng
                $thongbao = "Xóa khách hàng thành công";
                include "user/list.php";
                break;
                //-------------------------------------------------
        case 'listtk':
                $listthongke = loadAll_thongke(); //hàm laod tất cả khách hàng
                include "thongke/list.php";
                break;
                //phần chức năng hiển thị biêu đồ thông kê
        case 'bieudo':
                $listthongke = loadAll_thongke(); //hàm laod tất cả khách hàng
                include "thongke/bieudo.php";
                break;
        default:
            include "layout.php";
            break;
    }
} else {
    include "layout.php";
} 
    include "footer.php";

?>